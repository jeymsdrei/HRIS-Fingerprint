<?php

namespace Tests\Feature;

use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;
use Tests\TestCase;

/**
 * The SPA loader swaps only `.page-content` and re-runs the inline scripts inside it
 * (see executeContentScripts in resources/js/app.js). Two invariants follow, and
 * breaking either one silently disables page JS after navigating away and back.
 *
 * @see resources/js/app.js
 */
class ContentScriptInvariantsTest extends TestCase
{
    private function viewFiles(): array
    {
        $root = resource_path('views');
        $files = [];

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS)
        );

        /** @var SplFileInfo $file */
        foreach ($iterator as $file) {
            if ($file->getExtension() === 'php') {
                $files[] = $file->getPathname();
            }
        }

        return $files;
    }

    /** Inline classic scripts: no src attribute and not a module. */
    private function inlineScripts(string $source): array
    {
        preg_match_all(
            '/<script(?![^>]*\bsrc=)(?![^>]*type=[\'"]module)[^>]*>([\s\S]*?)<\/script>/i',
            $source,
            $matches,
            PREG_OFFSET_CAPTURE
        );

        return $matches[0] ?? [];
    }

    /**
     * A script placed after </x-app-layout> sits outside `.page-content`, so the SPA
     * swap never re-runs it. Its listeners die with the first navigation and the
     * returning page has no working script at all.
     */
    public function test_inline_scripts_stay_inside_the_layout(): void
    {
        $violations = [];

        foreach ($this->viewFiles() as $path) {
            $source = file_get_contents($path);

            // Views without a layout (partials, mail templates) are inlined into
            // a parent that already sits inside .page-content.
            $layoutEnd = strrpos($source, '</x-app-layout>');

            if ($layoutEnd === false) {
                continue;
            }

            foreach ($this->inlineScripts($source) as [$script, $offset]) {
                if ($offset > $layoutEnd) {
                    $violations[] = sprintf(
                        '%s:%d has an inline <script> after </x-app-layout>',
                        str_replace(resource_path('views').DIRECTORY_SEPARATOR, '', $path),
                        substr_count(substr($source, 0, $offset), "\n") + 1
                    );
                }
            }
        }

        $this->assertSame([], $violations, implode(PHP_EOL, $violations));
    }

    /**
     * Re-injecting a <script> element puts top-level const/let into the global
     * declarative environment, which outlives the swap. The next visit to the same
     * page then dies with "Identifier has already been declared" — at compile time,
     * so the whole block is skipped and nothing reports the failure. Evaluating the
     * body inside a function scope keeps those bindings disposable.
     */
    public function test_content_scripts_are_evaluated_in_an_isolated_scope(): void
    {
        $app = file_get_contents(resource_path('js/app.js'));

        $this->assertStringContainsString(
            'new AsyncFunction(source)()',
            $app,
            'executeContentScripts must evaluate inline bodies in a function scope, not by re-injecting a <script>.'
        );

        $this->assertStringNotContainsString(
            "oldScript.replaceWith(script);\n            } catch",
            $app,
            'Classic inline scripts must not be re-injected as real <script> elements.'
        );
    }

    /**
     * initTree evaluates x-data immediately, so a component that registers itself
     * with Alpine.data() in a content script must already be registered. Running
     * scripts after initTree leaves x-data="loansTable()" undefined on every SPA
     * navigation.
     */
    public function test_content_scripts_run_before_alpine_init_tree(): void
    {
        $app = file_get_contents(resource_path('js/app.js'));

        $scripts = strpos($app, 'executeContentScripts(nextContent);');
        $initTree = strpos($app, 'window.Alpine.initTree(nextContent);');

        $this->assertNotFalse($scripts, 'replaceAppContent must call executeContentScripts.');
        $this->assertNotFalse($initTree, 'replaceAppContent must call Alpine.initTree.');
        $this->assertLessThan(
            $initTree,
            $scripts,
            'executeContentScripts must run before Alpine.initTree so Alpine.data() registrations exist.'
        );
    }

    /** The loans table registers itself via a one-shot alpine:init hook on a hard load. */
    public function test_loans_table_registers_without_relying_on_alpine_init(): void
    {
        $source = file_get_contents(resource_path('views/loans/index.blade.php'));

        $this->assertStringContainsString(
            'Alpine.data(',
            $source,
            'The loans table must register itself with Alpine.data().'
        );

        $this->assertMatchesRegularExpression(
            '/if\s*\(\s*window\.Alpine\s*\)\s*\{[^}]*registerLoansTable/',
            $source,
            'The loans table must register directly when Alpine is already loaded, since alpine:init only ever fires once.'
        );
    }
}
