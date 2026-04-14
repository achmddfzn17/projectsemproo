# Plan: Upgrade UI/UX Kuisioner SUS ke Tailwind CSS Modern

## TL;DR

> **Quick Summary**: Transform halaman kuisioner SUS dari Bootstrap ke Tailwind CSS modern dengan progress indicator, visual Likert scale interaktif, dan desain yang matching dengan halaman admin lainnya.
>
> **Deliverables**:
> - File upgraded: `resources/views/admin/sus/index.blade.php`
> - Progress bar untuk 10 pertanyaan
> - Visual Likert scale dengan radio buttons engaging
> - Data responden dengan card modern
> - Alert/petunjuk dengan styling menarik
> - Responsive design dengan Tailwind
>
> **Estimated Effort**: Quick (1 file, ~200 lines)
> **Parallel Execution**: NO (single file work)
> **Critical Path**: Create modern SUS index.blade.php → QA verification

---

## Context

### Original Request
User ingin upgrade UI/UX kuisioner SUS System Usability Scale di project Laravel menjadi modern seperti design system Tailwind CSS yang sudah ada di halaman admin lainnya.

### Key References Found
- **Layout**: `layouts/admin.blade.php` - sudah include Tailwind CDN & Iconify
- **Reference 1**: `admin/keuangan/masuk.blade.php` - gradient header, cards dengan rounded-2xl, shadow-lg, form styling
- **Reference 2**: `admin/galeri/create.blade.php` - card styling, icon usage, responsive grid

### Design Patterns to Match
- Header gradient: `bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-xl`
- Card styling: `bg-white rounded-2xl shadow-lg border border-blue-200 p-6`
- Input styling: `rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500`
- Button gradient: `bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700`
- Table styling: `rounded-xl overflow-hidden`, hover effects dengan `hover:bg-blue-50`
- Icon usage: `<iconify-icon icon="mdi:icon-name"></iconify-icon>`

---

## Work Objectives

### Core Objective
Upgrade `resources/views/admin/sus/index.blade.php` dari Bootstrap ke Tailwind CSS modern dengan mempertahankan semua functionality (form action, 10 pertanyaan SUS, data responden fields, old() values).

### Concrete Deliverables
- Header dengan gradient dan iconify
- Section data responden dengan card modern
- Section 10 pertanyaan SUS dengan visual Likert scale (bukan plain table)
- Progress indicator untuk tracking pengisian
- Alert/petunjuk yang menarik
- Submit button dengan gradient styling
- Responsive design

### Definition of Done
- [ ] File `admin/sus/index.blade.php` upgraded ke Tailwind CSS
- [ ] Semua 10 pertanyaan SUS tetap ada dengan scale 1-5
- [ ] Semua data responden fields tetap ada (nama, email, usia, pendidikan, pengalaman_komputer)
- [ ] Form action tetap: `route('admin.sus.store')`
- [ ] `old()` values berfungsi untuk semua fields
- [ ] Progress indicator terlihat saat mengisi
- [ ] Visual Likert scale dengan hover animations
- [ ] Responsive untuk mobile
- [ ] Iconify icons digunakan

### Must Have
- Progress bar untuk 10 pertanyaan SUS
- Visual Likert scale dengan engaging radio buttons (bukan plain table)
- Modern card styling dengan rounded-2xl, shadows, gradients
- Hover animations pada radio buttons
- Alert/petunjuk dengan styling menarik
- Iconify icons konsisten dengan project

### Must NOT Have
- Bootstrap classes (`card`, `btn`, `table`, dll)
- Library baru (pakai Tailwind & Iconify yang sudah ada)
- Perubahan pada form action atau route
- Penghapusan functionality form

---

## Verification Strategy

### QA Policy
Every task includes agent-executed QA scenarios. Evidence saved to `.sisyphus/evidence/`.

**Verification Commands:**
```bash
# View the upgraded file
# Verify all 10 questions present (q1-q10)
# Verify all respondent fields present (nama, email, usia, pendidikan, pengalaman_komputer)
# Verify form action is route('admin.sus.store')
# Verify old() values preserved
# Verify Iconify icons used
# Verify Tailwind classes (no Bootstrap)
```

---

## Execution Strategy

### Single Wave (1 file, sequential)
```
Task 1: Upgrade admin/sus/index.blade.php to modern Tailwind CSS
├── Create header with gradient + icon
├── Upgrade respondent data section to modern cards
├── Create visual Likert scale (not table) with progress indicator
├── Add engaging radio button styling with hover animations
├── Upgrade submit button with gradient
└── Add JavaScript for progress tracking
```

---

## TODOs

- [ ] 1. Upgrade SUS questionnaire UI to modern Tailwind CSS

  **What to do**:
  - Replace Bootstrap classes with Tailwind CSS
  - Create gradient header matching reference files
  - Upgrade respondent data section with modern card styling
  - Create visual Likert scale (individual question cards, not table)
  - Add progress bar that updates as questions are answered
  - Add hover animations on radio buttons
  - Add engaging alert/petunjuk styling
  - Include Iconify icons throughout
  - Ensure responsive design
  - Preserve all form functionality, old() values, and validation

  **Must NOT do**:
  - Remove any of the 10 SUS questions (q1-q10)
  - Remove any respondent fields (nama, email, usia, pendidikan, pengalaman_komputer)
  - Change form action from `route('admin.sus.store')`
  - Add any new library dependencies

  **Recommended Agent Profile**:
  - **Category**: `visual-engineering`
    - Reason: This is a UI/UX upgrade task requiring modern styling matching existing design system
  - **Skills**: []
  - **Skills Evaluated but Omitted**:
    - `frontend-ui-ux`: Could help but not needed for this focused task

  **Parallelization**:
  - **Can Run In Parallel**: NO
  - **Parallel Group**: Single task
  - **Blocks**: None
  - **Blocked By**: None (can start immediately)

  **References** (CRITICAL):

  **Pattern References** (existing code to follow):
  - `resources/views/admin/keuangan/masuk.blade.php:7-22` - Gradient header pattern with icon and navigation buttons
  - `resources/views/admin/keuangan/masuk.blade.php:27-98` - Form card styling with rounded-2xl, shadow-lg, border
  - `resources/views/admin/keuangan/masuk.blade.php:96-98` - Gradient button with hover effects
  - `resources/views/layouts/admin.blade.php:8` - Iconify CDN already included
  - `resources/views/admin/galeri/create.blade.php:83-85` - Icon button pattern

  **WHY Each Reference Matters**:
  - keuangan/masuk.blade.php contains the exact styling patterns to match: gradient headers, rounded-2xl cards, shadow-lg borders, blue color scheme
  - galeri/create.blade.php shows icon integration with Tailwind
  - admin.blade.php confirms Iconify is already loaded and ready to use

  **Acceptance Criteria**:

  **QA Scenarios (MANDATORY):**

  ```
  Scenario: File upgraded to Tailwind CSS successfully
    Tool: Bash (grep)
    Preconditions: File exists at resources/views/admin/sus/index.blade.php
    Steps:
      1. grep "class=\"container-fluid\"" - should NOT find Bootstrap
      2. grep "rounded-2xl" - should find modern rounded corners
      3. grep "bg-gradient-to-r from-blue" - should find gradient styling
      4. grep "shadow-lg" - should find shadow styling
      5. grep "iconify-icon" - should find Iconify icons
    Expected Result: Bootstrap classes absent, Tailwind classes present
    Evidence: .sisyphus/evidence/task-1-tailwind-check.txt

  Scenario: All 10 SUS questions preserved
    Tool: Bash (grep)
    Preconditions: File upgraded
    Steps:
      1. grep -o "name=\"q[1-9]\"" | sort -u - should find q1 through q9
      2. grep "name=\"q10\"" - should find q10
      3. grep "value=\"1\"" (in Likert context) - should find scale 1-5 options
    Expected Result: All 10 questions (q1-q10) with values 1-5 present
    Evidence: .sisyphus/evidence/task-1-questions-check.txt

  Scenario: All respondent fields preserved
    Tool: Bash (grep)
    Preconditions: File upgraded
    Steps:
      1. grep 'name="nama"' - should find nama field
      2. grep 'name="email"' - should find email field
      3. grep 'name="usia"' - should find usia field
      4. grep 'name="pendidikan"' - should find pendidikan field
      5. grep 'name="pengalaman_komputer"' - should find pengalaman field
    Expected Result: All 5 respondent fields present
    Evidence: .sisyphus/evidence/task-1-fields-check.txt

  Scenario: Form action preserved
    Tool: Bash (grep)
    Preconditions: File upgraded
    Steps:
      1. grep "action=\"{{ route('admin.sus.store') }}\"" - should find
    Expected Result: Form action unchanged
    Evidence: .sisyphus/evidence/task-1-form-action-check.txt

  Scenario: Visual Likert scale implemented (not table)
    Tool: Bash (grep)
    Preconditions: File upgraded
    Steps:
      1. grep "table table-bordered" - should NOT find old table
      2. grep "grid grid-cols" - should find grid layout for Likert
      3. grep "peer-checked" or similar Tailwind peer styling - should find interactive styling
    Expected Result: Table replaced with visual card/grid layout
    Evidence: .sisyphus/evidence/task-1-likert-check.txt

  Scenario: Progress indicator present
    Tool: Bash (grep)
    Preconditions: File upgraded
    Steps:
      1. grep "progress" or "w-full.*bg-" - should find progress bar
      2. grep JavaScript for progress tracking
    Expected Result: Progress indicator visible and functional
    Evidence: .sisyphus/evidence/task-1-progress-check.txt
  ```

  **Evidence to Capture:**
  - [ ] Grep results showing Tailwind classes
  - [ ] Grep results showing all 10 questions
  - [ ] Grep results showing all respondent fields
  - [ ] Confirmation form action preserved
  - [ ] Confirmation table replaced with visual layout

  **Commit**: YES
  - Message: `refactor(admin): upgrade SUS questionnaire UI to modern Tailwind CSS`
  - Files: `resources/views/admin/sus/index.blade.php`

---

## Final Verification Wave

- [ ] F1. **Plan Compliance Audit** — `oracle`
  Read the plan and verify: all requirements implemented, no Bootstrap classes, all functionality preserved, matching admin aesthetic.

- [ ] F2. **Code Quality Review** — `quick`
  Verify no syntax errors, proper closing tags, valid Tailwind classes.

- [ ] F3. **Visual QA** — `unspecified-high`
  Open the file and verify all visual elements render correctly.

- [ ] F4. **Scope Fidelity Check** — `deep`
  Verify nothing extra was added, all required elements present.

---

## Success Criteria

### Verification Commands
```bash
# Should NOT find Bootstrap
grep "container-fluid" resources/views/admin/sus/index.blade.php  # should fail
grep "card-header" resources/views/admin/sus/index.blade.php  # should fail

# Should find Tailwind
grep "rounded-2xl" resources/views/admin/sus/index.blade.php  # should pass
grep "shadow-lg" resources/views/admin/sus/index.blade.php  # should pass
grep "iconify-icon" resources/views/admin/sus/index.blade.php  # should pass

# Should find all questions
grep -E "name=\"q[1-9]\"" resources/views/admin/sus/index.blade.php | wc -l  # should be 9
grep "name=\"q10\"" resources/views/admin/sus/index.blade.php  # should pass

# Should find all respondent fields
grep "name=\"nama\"" resources/views/admin/sus/index.blade.php  # should pass
grep "name=\"email\"" resources/views/admin/sus/index.blade.php  # should pass
grep "name=\"usia\"" resources/views/admin/sus/index.blade.php  # should pass
grep "name=\"pendidikan\"" resources/views/admin/sus/index.blade.php  # should pass
grep "name=\"pengalaman_komputer\"" resources/views/admin/sus/index.blade.php  # should pass

# Should preserve form action
grep "route('admin.sus.store')" resources/views/admin/sus/index.blade.php  # should pass
```

### Final Checklist
- [ ] All Bootstrap classes replaced with Tailwind CSS
- [ ] All 10 SUS questions (q1-q10) preserved with scale 1-5
- [ ] All 5 respondent fields preserved (nama, email, usia, pendidikan, pengalaman_komputer)
- [ ] Form action unchanged: `route('admin.sus.store')`
- [ ] `old()` values preserved for all fields
- [ ] Progress indicator for 10 questions added
- [ ] Visual Likert scale (not plain table) implemented
- [ ] Hover animations on radio buttons
- [ ] Iconify icons included
- [ ] Responsive design
- [ ] Matches aesthetic of admin/keuangan and admin/galeri pages
