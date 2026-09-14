# SYSTEMS FOLDER — AI CODING AGENT INSTRUCTIONS

> Authoritative guide for OpenCode, Claude Code, and other CLI coding agents working inside `systems/`.
> Read this file BEFORE modifying anything in this folder.

## 1. Core Rule

Treat `systems/` as an existing working codebase, not a blank project.

For every task:

1. Read this file.
2. Inspect the repository and relevant files.
3. Trace the existing implementation and data flow.
4. Identify the smallest safe change.
5. Modify only what is necessary.
6. Preserve unrelated functionality.
7. Validate the result.

**Never guess when the code can be inspected.**

## 2. Scope

These rules apply to:

```text
systems/
```

and all subfolders.

If the user says "only change X", treat that as a strict scope requirement. Do not modify unrelated modules, UI, database logic, routes, or integrations.

If another file must be changed, identify why it is technically required.

## 3. Inspect Before Editing

Before editing, determine:

- Framework/language.
- Relevant routes/controllers/services.
- Relevant models/entities.
- Database tables, migrations, and relationships.
- Views/components/UI.
- Existing APIs and integrations.
- Existing tests.
- Existing implementation of the requested feature.

Search first:

```bash
rg "functionName" systems/
rg "ClassName" systems/
rg "table_name" systems/
rg "field_name" systems/
rg "route-name" systems/
```

Do not edit a file merely because its filename looks relevant.

## 4. Minimal Changes

Preferred order:

1. Reuse existing code.
2. Extend existing implementation.
3. Add a small helper/file only if necessary.
4. Refactor only when required for the requested feature.

Avoid:

- Large rewrites.
- Unrelated refactoring.
- Renaming unrelated files.
- Replacing working architecture without need.
- New dependencies for small problems.
- Formatting unrelated files.
- Duplicate implementations.

## 5. Preserve Existing Functionality

Unless explicitly requested, preserve:

- Routes.
- Authentication and authorization.
- Database relationships and existing data.
- CRUD behavior.
- Validation.
- Calculations.
- API behavior.
- Integrations.
- Permissions.
- File handling.
- Error handling.
- Existing UI functionality.

A UI redesign must not silently change business logic.

A business-logic change must not silently redesign unrelated UI.

## 6. Database Safety

Treat the database as critical.

Before database changes:

1. Inspect models.
2. Inspect migrations/schema.
3. Inspect relationships.
4. Search for all usages of affected fields/tables.
5. Determine whether existing data depends on them.

Never perform destructive operations unless explicitly requested.

Do NOT casually use:

```bash
php artisan migrate:fresh
php artisan db:wipe
```

Do not drop tables, delete records, reset databases, or change field meanings simply to fix an error.

Prefer backward-compatible changes.

## 7. Business Rules

Use this priority for requirements:

1. Current explicit user request.
2. This `SYSTEMS.md`.
3. Existing project requirements/documentation.
4. Existing working implementation.
5. General best practices.

Do not invent business rules.

If something is ambiguous, inspect the existing implementation first and use the least disruptive interpretation. State important assumptions.

## 8. HRIS / Payroll Safety

If this system contains HRIS, attendance, payroll, employee, leave, or biometric functionality, treat these as critical:

- Employee records.
- Employee IDs.
- Attendance.
- Time-in/time-out.
- Payroll records.
- Rates/salaries.
- Deductions.
- Benefits.
- Loans/debts.
- Make-up class records.
- Leave records.
- Biometric identifiers/templates.
- Payroll history.

Never delete or overwrite these without explicit instruction.

### Payroll

Before changing payroll, trace:

- Source of working hours.
- Employee type.
- Rates.
- Payroll period.
- Deductions.
- Benefits.
- Additions.
- Attendance relationship.
- Existing payroll calculation flow.

If teaching and non-teaching logic are separate, preserve that separation unless the user explicitly requests otherwise.

Do not modify attendance or biometric logic when the request is only about payroll unless technically required.

## 9. Biometric / Attendance Integration

When modifying fingerprint or biometric functionality:

- Preserve the existing SDK/integration.
- Preserve fingerprint registration/capture behavior.
- Preserve employee ID mapping.
- Preserve time-in/time-out behavior.
- Do not replace the backend merely to redesign the UI.
- Do not alter fingerprint template handling without explicit instruction.

Keep UI changes separate from capture/integration logic whenever possible.

## 10. UI / Design Changes

For UI-only requests:

DO:

- Preserve functionality.
- Preserve form fields unless requested otherwise.
- Preserve routes/actions.
- Preserve validation.
- Preserve data bindings.
- Follow the existing design system.
- Improve layout, spacing, hierarchy, responsiveness, and accessibility.

DO NOT:

- Remove working controls.
- Change business logic.
- Change database logic.
- Introduce unnecessary UI libraries.
- Break existing interactions.

## 11. Dependencies

Before adding a package:

1. Check whether the project already provides the feature.
2. Inspect `composer.json`, `package.json`, or equivalent.
3. Prefer existing dependencies.
4. Add a dependency only when necessary.

Do not introduce a large library for a small task.

## 12. Read Before Write

Before changing a file:

- Read the relevant section.
- Understand imports and dependencies.
- Understand surrounding methods.
- Search for callers/usages.
- Check related tests.

After editing:

- Re-read the changed section.
- Check syntax.
- Check imports.
- Check references.
- Check for unintended side effects.

## 13. Validation

Use the narrowest useful validation first.

### PHP / Laravel

```bash
php -l path/to/file.php
php artisan route:list
php artisan test
```

### JavaScript / TypeScript

```bash
npm run lint
npm run build
```

### C#

```bash
dotnet build
dotnet test
```

Use the commands appropriate to the actual project.

Never run destructive commands just to make validation pass.

If validation cannot be completed, say so.

## 14. Error Handling

When an error occurs:

1. Read the complete error.
2. Identify the actual failing file/line.
3. Trace the root cause.
4. Fix the root cause.
5. Avoid unrelated changes.
6. Re-run the relevant check.

Do not hide errors by disabling validation or suppressing exceptions.

## 15. No Fake Completion

Do not claim:

- "Done"
- "Fixed"
- "Working"
- "Tested"

unless the work was actually completed and appropriately verified.

If verification is incomplete, explicitly say what remains unverified.

## 16. Security

Never expose or commit:

- Passwords.
- API keys.
- Tokens.
- Private keys.
- Database credentials.
- Biometric templates.
- Other secrets.

Do not put secrets directly into source code.

Do not weaken authentication or authorization to make a feature work.

## 17. Configuration

Do not casually modify:

- `.env`
- Authentication configuration.
- Database configuration.
- Server configuration.
- Deployment configuration.
- Package versions.

Only change configuration when required by the task.

Never commit local secrets.

## 18. Git Safety

Before significant changes:

```bash
git status
```

Do not overwrite unrelated uncommitted work.

Never routinely use:

```bash
git reset --hard
git clean -fd
```

Do not discard user changes unless explicitly instructed.

## 19. When a Prompt Conflicts With the Code

Do not blindly implement a prompt that would obviously break existing architecture, data, or functionality.

Instead:

1. Inspect the current implementation.
2. Identify the conflict.
3. Choose the safest interpretation.
4. Make the minimum required change.
5. Report the conflict and resolution.

## 20. Agent Workflow

### Phase 1 — Understand

- Read `SYSTEMS.md`.
- Read the user's request.
- Identify exact scope.
- Identify acceptance criteria.

### Phase 2 — Inspect

- Search relevant files.
- Read the implementation.
- Trace data flow.
- Check dependencies and usages.

### Phase 3 — Plan

Keep the plan short:

```text
Files to modify:
Existing behavior:
Required behavior:
Minimal implementation:
Validation:
```

### Phase 4 — Implement

- Make minimal changes.
- Follow existing conventions.
- Preserve unrelated behavior.

### Phase 5 — Verify

- Run appropriate checks.
- Inspect errors.
- Re-check the affected feature.

### Phase 6 — Report

Use:

```text
Changed:
- ...

Preserved:
- ...

Validation:
- ...

Notes:
- ...
```

## 21. Final Checklist

Before finishing:

- [ ] Read `SYSTEMS.md`.
- [ ] Understood the requested scope.
- [ ] Inspected the existing implementation.
- [ ] Searched related usages.
- [ ] Did not guess important project details.
- [ ] Changed only what was necessary.
- [ ] Preserved unrelated functionality.
- [ ] Avoided destructive database operations.
- [ ] Did not expose secrets.
- [ ] Checked syntax/build errors.
- [ ] Verified the requested behavior where possible.
- [ ] Clearly reported changes and limitations.

## 22. Final Directive

**Accuracy > speed.**

**Existing functionality > unnecessary refactoring.**

**Minimal safe changes > large rewrites.**

**Inspect first. Plan second. Modify third. Verify last.**

Never assume how the system works when the repository can tell you.
