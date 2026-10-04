<?php

namespace Tests\Feature;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class FilterPersistenceTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin', 'is_active' => true]);
    }

    /**
     * AttendanceController::index re-runs AttendanceService::processDate() on every
     * request, which rewrites status/hours. Filters asserted here therefore stick to
     * department and search, which that recompute never touches.
     */
    private function seedAttendance(string $date, ?Department $department = null): Attendance
    {
        $employee = Employee::create([
            'employee_id' => 'EMP-0001',
            'first_name' => 'Juan',
            'last_name' => 'Reyes',
            'classification' => 'teaching',
            'employment_status' => 'permanent',
            'department_id' => $department?->id,
            'is_active' => true,
        ]);

        return Attendance::create([
            'employee_id' => $employee->id,
            'department_id' => $department?->id,
            'date' => $date,
            'day' => Carbon::parse($date)->dayName,
            'status' => Attendance::PRESENT,
            'working_hours' => 8,
        ]);
    }

    /** @return array<string, string> href => label */
    private function dayNavLinks(string $html): array
    {
        preg_match_all(
            '#<a href="([^"]*/attendance\?[^"]*)" class="btn btn-(?:outline|secondary) btn-sm">\s*(?:<svg.*?</svg>\s*)?([A-Za-z]+)#s',
            $html,
            $matches,
            PREG_SET_ORDER,
        );

        $links = [];

        foreach ($matches as [, $href, $label]) {
            if (in_array($label, ['Prev', 'Today', 'Next'], true)) {
                $links[$label] = html_entity_decode($href);
            }
        }

        return $links;
    }

    public function test_attendance_filters_are_repopulated_from_the_query_string(): void
    {
        $department = Department::create(['name' => 'Mathematics']);

        $this->actingAs($this->admin())
            ->get('/attendance?'.http_build_query([
                'date' => '2026-01-15',
                'department_id' => $department->id,
                'classification' => 'teaching',
                'employment_status' => 'permanent',
                'status' => 'late',
                'search' => 'dela cruz',
            ]))
            ->assertOk()
            ->assertSee('value="dela cruz"', false)
            ->assertSee('value="'.$department->id.'" selected', false)
            ->assertSee('value="teaching" selected', false)
            ->assertSee('value="permanent" selected', false)
            ->assertSee('value="late" selected', false);
    }

    public function test_attendance_day_navigation_keeps_every_active_filter(): void
    {
        $html = $this->actingAs($this->admin())
            ->get('/attendance?'.http_build_query([
                'date' => '2026-01-15',
                'department_id' => 3,
                'classification' => 'non_teaching',
                'employment_status' => 'contractual',
                'status' => 'absent',
                'search' => 'santos',
                'page' => 3,
            ]))
            ->assertOk()
            ->getContent();

        $links = $this->dayNavLinks($html);

        $this->assertSame(['Prev', 'Today', 'Next'], array_keys($links));

        foreach ($links as $label => $href) {
            $this->assertStringContainsString('department_id=3', $href, "{$label} dropped department_id");
            $this->assertStringContainsString('classification=non_teaching', $href, "{$label} dropped classification");
            $this->assertStringContainsString('employment_status=contractual', $href, "{$label} dropped employment_status");
            $this->assertStringContainsString('status=absent', $href, "{$label} dropped status");
            $this->assertStringContainsString('search=santos', $href, "{$label} dropped search");
            $this->assertStringNotContainsString('page=', $href, "{$label} should reset pagination");
        }

        $this->assertStringContainsString('date=2026-01-14', $links['Prev']);
        $this->assertStringContainsString('date=2026-01-16', $links['Next']);
    }

    public function test_attendance_correct_link_carries_filters_to_the_edit_screen(): void
    {
        $department = Department::create(['name' => 'Mathematics']);

        $this->seedAttendance('2026-01-15', $department);

        $html = $this->actingAs($this->admin())
            ->get('/attendance?'.http_build_query([
                'date' => '2026-01-15',
                'department_id' => $department->id,
                'search' => 'reyes',
            ]))
            ->assertOk()
            ->getContent();

        $this->assertMatchesRegularExpression(
            '#/attendance/\d+/edit\?[^"]*department_id='.$department->id.'[^"]*#',
            $html,
            'The Correct link does not carry the active department filter.'
        );

        $this->assertMatchesRegularExpression(
            '#/attendance/\d+/edit\?[^"]*search=reyes#',
            $html,
            'The Correct link does not carry the active search term.'
        );
    }

    public function test_saving_an_attendance_correction_returns_to_the_same_filters(): void
    {
        $department = Department::create(['name' => 'Mathematics']);

        $attendance = $this->seedAttendance('2026-01-15', $department);

        $url = $this->actingAs($this->admin())
            ->put('/attendance/'.$attendance->id, [
                'time_in' => '08:00',
                'time_out' => '17:00',
                'remarks' => 'Present',
                'department_id' => $department->id,
                'search' => 'reyes',
            ])
            ->assertRedirect()
            ->headers->get('Location');

        $this->assertStringContainsString('department_id='.$department->id, $url);
        $this->assertStringContainsString('search=reyes', $url);
        $this->assertStringContainsString('date=2026-01-15', $url);
    }

    public function test_archive_filters_are_all_submitted_together(): void
    {
        $html = $this->actingAs($this->admin())
            ->get('/archives?'.http_build_query([
                'year' => 2025,
                'month' => 6,
                'department_id' => 2,
                'classification' => 'teaching',
                'employment_status' => 'permanent',
                'record_type' => 'payroll',
                'from' => '2025-06-01',
                'to' => '2025-06-30',
            ]))
            ->assertOk()
            ->getContent();

        $filterFields = ['year', 'month', 'department_id', 'classification', 'employment_status', 'record_type', 'from', 'to'];

        preg_match_all('#<form method="GET" action="[^"]*archives[^"]*"[^>]*>(.*?)</form>#s', $html, $forms, PREG_SET_ORDER);

        $this->assertNotEmpty($forms, 'No archive filter form was rendered.');

        // A form that submits one filter must submit them all, otherwise applying
        // it silently discards every filter it does not carry.
        foreach ($forms as $index => $form) {
            preg_match_all('#name="([a-z_]+)"#', $form[1], $declared);

            $submitted = array_values(array_intersect($filterFields, $declared[1]));

            if ($submitted === []) {
                continue;
            }

            $this->assertSame(
                [],
                array_values(array_diff($filterFields, $declared[1])),
                'Archive GET form #'.$index.' submits only '.implode(', ', $submitted).' and would wipe the rest.'
            );
        }
    }

    public function test_archives_page_renders_when_no_records_match(): void
    {
        $this->actingAs($this->admin())
            ->get('/archives?year=1999&month=1')
            ->assertOk()
            ->assertSee('No historical data available');
    }

    public function test_report_generator_repopulates_its_filters_on_reload(): void
    {
        $this->actingAs($this->admin())
            ->get('/reports?'.http_build_query([
                'type' => 'late',
                'classification' => 'non_teaching',
                'employment_status' => 'contractual',
                'from' => '2026-02-01',
                'to' => '2026-02-28',
            ]))
            ->assertOk()
            ->assertSee('value="late" selected', false)
            ->assertSee('value="non_teaching" selected', false)
            ->assertSee('value="contractual" selected', false)
            ->assertSee('value="2026-02-01"', false)
            ->assertSee('value="2026-02-28"', false);
    }

    public function test_makeup_employee_and_subject_pickers_are_type_ahead_searches(): void
    {
        Employee::create([
            'employee_id' => 'EMP-0001',
            'first_name' => 'Juan',
            'last_name' => 'Reyes',
            'classification' => 'teaching',
            'employment_status' => 'permanent',
            'is_active' => true,
        ]);
        Employee::create([
            'employee_id' => 'EMP-0002',
            'first_name' => 'Ana',
            'last_name' => 'Cruz',
            'classification' => 'non_teaching',
            'employment_status' => 'permanent',
            'is_active' => true,
        ]);
        Subject::create(['code' => 'BIO101', 'name' => 'Biology']);

        $this->actingAs($this->admin())
            ->get('/makeup')
            ->assertOk()
            // Both the employee and the subject field are the shared type-ahead, not a native select.
            ->assertSee('id="typeahead-employee_id"', false)
            ->assertSee('id="typeahead-subject_id"', false)
            ->assertSee('role="combobox"', false)
            ->assertSee('Juan Reyes')
            ->assertSee('Biology')
            ->assertDontSee('Ana Cruz')
            // The real form controls still submit ids.
            ->assertSee('name="employee_id"', false)
            ->assertSee('name="subject_id"', false);
    }

    public function test_the_shared_typeahead_is_used_on_every_converted_page(): void
    {
        $employee = Employee::create([
            'employee_id' => 'EMP-0001',
            'first_name' => 'Juan',
            'last_name' => 'Reyes',
            'classification' => 'teaching',
            'employment_status' => 'permanent',
            'is_active' => true,
        ]);
        Subject::create(['code' => 'BIO101', 'name' => 'Biology']);

        $admin = $this->admin();

        foreach (['/makeup', '/benefits', '/biometrics/punches', '/users/create', '/loans'] as $url) {
            $this->actingAs($admin)
                ->get($url)
                ->assertOk()
                ->assertSee('role="combobox"', false)
                ->assertSee('Type a name or ID', false);
        }

        // Employee self-service subject picker.
        $this->actingAs(User::factory()->create([
            'role' => 'employee',
            'is_active' => true,
            'employee_id' => $employee->id,
        ]))
            ->get('/my/makeup-classes')
            ->assertOk()
            ->assertSee('role="combobox"', false)
            ->assertSee('Type a code or name', false);
    }

    /**
     * The course picker must keep the acronym: as the prominent list line, as the
     * subline beside the full name, and in the text the input settles on.
     */
    public function test_course_picker_keeps_the_acronym_visible(): void
    {
        Course::create(['code' => 'BSCS', 'name' => 'Bachelor of Science in Computer Science']);
        Course::create(['code' => 'BSED', 'name' => 'Bachelor of Science in Education']);

        $employee = Employee::create([
            'employee_id' => 'EMP-0001',
            'first_name' => 'Juan',
            'last_name' => 'Reyes',
            'classification' => 'teaching',
            'employment_status' => 'permanent',
            'is_active' => true,
            'course_id' => Course::where('code', 'BSCS')->value('id'),
        ]);

        $html = $this->actingAs($this->admin())
            ->get('/employees/'.$employee->id.'/edit')
            ->assertOk()
            ->assertSee('typeahead-course_id', false)
            ->getContent();

        // @js() escapes quotes for an HTML attribute as JS \u0022 sequences, so unwrap
        // both the HTML entity layer and the JS escape layer before asserting.
        $decoded = str_replace('\u0022', '"', html_entity_decode($html, ENT_QUOTES, 'UTF-8'));

        $this->assertStringContainsString('"label":"BSCS"', $decoded, 'The acronym must be the prominent list line.');
        $this->assertStringContainsString(
            '"meta":"Bachelor of Science in Computer Science"',
            $decoded,
            'The full course name must be kept as the subline.'
        );
        $this->assertStringContainsString(
            'x-text="p.meta"',
            $html,
            'The subline must actually be rendered, not only present in the payload.'
        );
        $this->assertStringContainsString('name="course_id"', $html, 'The real form control must still submit.');
        // Selected course is prefilled rather than dropped.
        $this->assertStringContainsString('selectedId: \'1\'', $decoded);
    }

    /**
     * The users filter must filter in the browser, so it cannot submit anything.
     * This is the regression guard for "one request per typing pause": the filter
     * script must contain no network call of any kind.
     */
    public function test_users_filters_never_hit_the_network(): void
    {
        $html = $this->actingAs($this->admin())
            ->get('/users')
            ->assertOk()
            ->getContent();

        preg_match_all('/<script>(.*?)<\/script>/s', $html, $all);
        $filterScript = '';
        foreach ($all[1] as $candidate) {
            if (str_contains($candidate, 'users-search')) {
                $filterScript = $candidate;
            }
        }

        $this->assertNotSame('', $filterScript, 'The browser filter script must be present.');

        foreach (['fetch(', 'XMLHttpRequest', 'axios', '.submit()', 'location.assign', 'location.reload'] as $forbidden) {
            $this->assertStringNotContainsString(
                $forbidden,
                $filterScript,
                "The filter must not trigger a request, but it contains {$forbidden}."
            );
        }

        // No Filter button, and no debounced auto-submit left on the controls.
        $this->assertStringNotContainsString('>Filter<', $html);
        $this->assertStringNotContainsString('@input.debounce', $html);
        $this->assertStringNotContainsString('$el.form.submit()', $html);
    }

    /**
     * The whole set must reach the browser, otherwise client-side filtering would only
     * ever see the rows the server happened to render.
     */
    public function test_users_index_returns_every_user_unpaginated(): void
    {
        $admin = $this->admin();

        User::factory()->count(20)->create();

        $html = $this->actingAs($admin)->get('/users')
            ->assertOk()
            ->getContent();

        // 21 users, no pagination: an employee-name search must reach all of them.
        $this->assertSame(21, substr_count($html, 'data-user-search='));
        $this->assertStringNotContainsString('rel="next"', $html);
    }

    /**
     * Each row must carry everything the browser filter matches on: the user's own
     * name and username plus the linked employee's id and full name.
     */
    public function test_user_rows_expose_searchable_names_for_the_browser_filter(): void
    {
        $admin = $this->admin();

        $maria = Employee::create([
            'employee_id' => 'EMP-0100',
            'first_name' => 'Maria',
            'last_name' => 'Villanueva',
            'classification' => 'non_teaching',
            'employment_status' => 'permanent',
            'is_active' => true,
        ]);

        User::factory()->create([
            'name' => 'Zed Admin',
            'username' => 'zed.admin',
            'role' => 'hr',
            'employee_id' => $maria->id,
        ]);

        $html = $this->actingAs($admin)->get('/users')->assertOk()->getContent();

        $this->assertMatchesRegularExpression(
            '/data-user-search="[^"]*zed admin[^"]*zed\.admin[^"]*emp-0100[^"]*maria villanueva[^"]*"/i',
            $html,
            'The row must expose name, username, employee id and employee full name to the filter.'
        );
        $this->assertStringContainsString('data-role="hr"', $html);
    }

    /**
     * Runs the real filter script out of the rendered page against a stubbed DOM, so the
     * filtering itself is exercised rather than a copy of it. Skips if node is absent.
     */
    public function test_users_search_filters_letter_by_letter_in_the_browser(): void
    {
        $html = $this->actingAs($this->admin())->get('/users')->assertOk()->getContent();

        preg_match_all('/<script>(.*?)<\/script>/s', $html, $all);
        $script = '';
        foreach ($all[1] as $candidate) {
            if (str_contains($candidate, 'users-search')) {
                $script = $candidate;
            }
        }

        $this->assertNotSame('', $script, 'The browser filter script must be present.');

        $node = $this->nodeBinary();
        if ($node === null) {
            $this->markTestSkipped('node is not available.');
        }

        // Rows mirror real page data: a linked employee, an unlinked user, and a second
        // "Reyes" in another role that must not leak past the role filter. "Marcos"
        // narrows out one letter after "Zed/Maria", so the letter-by-letter behaviour
        // is actually observable.
        $rows = [
            ['userSearch' => 'zed admin zed.admin emp-0100 maria villanueva', 'role' => 'hr', 'label' => 'Zed/Maria'],
            ['userSearch' => 'reyes navarro reyes.navarro', 'role' => 'hr', 'label' => 'Reyes (hr)'],
            ['userSearch' => 'reyes other reyes.payroll', 'role' => 'payroll_officer', 'label' => 'Reyes Other (payroll)'],
            ['userSearch' => 'amara del cruz amara.delcruz', 'role' => 'admin', 'label' => 'Amara'],
            ['userSearch' => 'marcos taylor marcos.taylor', 'role' => 'admin', 'label' => 'Marcos'],
        ];

        $stub = <<<'JS'
        const rows = __ROWS__;
        const listeners = {};
        const control = (v) => ({ value: v, hidden: false, style: {},
            addEventListener: (t, fn) => { (listeners[t] = listeners[t] || []).push(fn); } });
        const search = control('');
        const role = control('');
        const status = { textContent: '' };
        const noResults = { hidden: false };
        const emptyState = { hidden: false };
        const ids = { 'users-search': search, 'users-role': role,
                      'users-search-status': status, 'users-no-results': noResults,
                      'users-empty': emptyState };
        const rowEls = rows.map(r => ({ dataset: { userSearch: r.userSearch, role: r.role },
            hidden: false, style: {}, label: r.label }));
        let replaced = null;
        global.document = {
            getElementById: (id) => (id in ids ? ids[id] : null),
            querySelectorAll: (sel) => (sel === '.user-row' ? rowEls : []),
        };
        global.window = {
            location: { href: 'http://localhost/users' },
            history: { replaceState: (a, b, u) => { replaced = u.toString(); } },
        };
        JS;

        $driver = <<<'JS'
        const fire = (t) => (listeners[t] || []).forEach(fn => fn());
        const visible = () => rowEls.filter(r => !r.hidden).map(r => r.label);
        const out = {};

        for (const term of ['m', 'ma', 'mar', 'maria']) {
            search.value = term; fire('input');
            out['typed_' + term] = visible();
        }

        search.value = 'v'; fire('input'); out.byEmployeeLastName = visible();
        search.value = 'emp-0100'; fire('input'); out.byEmployeeId = visible();
        search.value = 'amara'; fire('input'); out.unrelatedHidden = visible();

        search.value = 'reyes'; fire('input'); out.searchOnly = visible();
        role.value = 'hr'; fire('change'); out.searchAndRole = visible();
        out.urlMirrored = replaced;

        search.value = 'zzzznope'; fire('input');
        out.noResults = noResults.hidden === false && visible().length === 0;

        search.value = ''; role.value = ''; fire('input');
        out.restored = visible().length === 5;

        console.log(JSON.stringify(out));
        JS;

        // The rows go into the file itself rather than argv: passing JSON through a
        // Windows shell mangles the quotes.
        $stub = str_replace('__ROWS__', (string) json_encode($rows), $stub);

        $tmp = sys_get_temp_dir().DIRECTORY_SEPARATOR.'users-filter-'.bin2hex(random_bytes(6)).'.js';
        file_put_contents($tmp, $stub."\n".$script."\n".$driver);

        try {
            $result = shell_exec(escapeshellarg($node).' '.escapeshellarg($tmp).' 2>&1');
        } finally {
            @unlink($tmp);
        }

        $decoded = json_decode(trim((string) $result), true);
        $this->assertIsArray($decoded, 'The filter script must run cleanly. Output: '.$result);

        // Typing letter by letter keeps narrowing: "mar" still matches Marcos, "maria"
        // drops him. Matches are prefix based, so "m" legitimately hits both.
        $this->assertSame(['Zed/Maria', 'Marcos'], $decoded['typed_m']);
        $this->assertSame(['Zed/Maria', 'Marcos'], $decoded['typed_ma']);
        $this->assertSame(['Zed/Maria', 'Marcos'], $decoded['typed_mar']);
        $this->assertSame(['Zed/Maria'], $decoded['typed_maria']);

        // Matches on the linked employee, not only the user record.
        $this->assertSame(['Zed/Maria'], $decoded['byEmployeeLastName']);
        $this->assertSame(['Zed/Maria'], $decoded['byEmployeeId']);

        // An employee-name search must not drag in unrelated users.
        $this->assertSame(['Amara'], $decoded['unrelatedHidden']);

        // Role narrows the match set and does not leak the other role's Reyes.
        $this->assertSame(['Reyes (hr)', 'Reyes Other (payroll)'], $decoded['searchOnly']);
        $this->assertSame(['Reyes (hr)'], $decoded['searchAndRole']);

        // Mirrored into the URL so reload and Back restore the filter.
        $this->assertStringContainsString('search=reyes', $decoded['urlMirrored']);
        $this->assertStringContainsString('role=hr', $decoded['urlMirrored']);

        $this->assertTrue($decoded['noResults']);
        $this->assertTrue($decoded['restored']);
    }

    private function nodeBinary(): ?string
    {
        $path = @shell_exec('where node 2>nul');

        return is_string($path) && trim($path) !== '' ? 'node' : null;
    }
}
