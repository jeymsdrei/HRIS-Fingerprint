# HRIS Modern Design System - Implementation Guide

## Overview
The HRIS system has been redesigned with a professional, enterprise-grade design system. This document provides guidelines for applying the design system to all remaining modules.

## Design System Foundation

### Color Palette
- **Primary**: Indigo-600 (#4f46e5) - Main actions, navigation highlights
- **Success**: Green-500 (#22c55e) - Positive status, approved items
- **Warning**: Amber-500 (#f59e0b) - Late arrivals, pending items
- **Danger**: Red-500 (#ef4444) - Absent, rejected, errors
- **Navy**: Navy-900 (#0f1419) - Sidebar, dark backgrounds
- **Neutral**: Slate colors - Text, borders, backgrounds

### Typography
- **Font Family**: Inter, Manrope, Figtree (fallback)
- **Page Title**: 30px bold
- **Card Title**: 18px semibold
- **Body Text**: 14px regular
- **Small Text**: 12px regular

### Spacing System
- Base unit: 4px
- Common: 8px (2 units), 16px (4 units), 24px (6 units), 32px (8 units)

### Border Radius
- Cards & buttons: 8-12px
- Inputs: 8px
- Small elements: 4-6px

### Shadows
- Cards: `0 1px 3px rgba(0,0,0,0.1)`
- Hover: `0 10px 15px -3px rgba(0,0,0,0.1)`

## Component Patterns

### 1. Page Layout Template
```blade
<x-app-layout hris>
    <x-slot name="title">Module Name</x-slot>
    
    <div class="page-container">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Module Title</h1>
            <p class="mt-2 text-slate-600">Brief description of module</p>
        </div>

        <!-- Content Goes Here -->
    </div>
</x-app-layout>
```

### 2. KPI/Stat Card
```blade
<div class="kpi-card group hover:shadow-hover transition-all duration-fast">
    <div class="flex items-start justify-between">
        <div>
            <p class="kpi-label">Label</p>
            <p class="kpi-value">Value</p>
            <p class="kpi-subtitle">Additional info</p>
        </div>
        <div class="p-3 rounded-lg bg-indigo-50 text-indigo-600">
            <!-- Icon SVG -->
        </div>
    </div>
</div>
```

### 3. Data Table
```blade
<div class="card">
    <div class="overflow-x-auto">
        <table class="data-table">
            <thead class="table-head">
                <tr>
                    <th class="table-head-cell">Column</th>
                    <!-- More columns -->
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                <tr class="table-body-row">
                    <td class="table-body-cell">{{ $item->data }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="X" class="table-body-cell">
                        <div class="empty-state py-12">
                            <div class="empty-state-icon">📋</div>
                            <div class="empty-state-title">No Records</div>
                            <p class="empty-state-text">Description of empty state</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
```

### 4. Status Badge
```blade
<!-- Success -->
<span class="badge badge-success">Approved</span>

<!-- Warning -->
<span class="badge badge-warning">Pending</span>

<!-- Danger -->
<span class="badge badge-danger">Rejected</span>

<!-- Info -->
<span class="badge badge-info">In Progress</span>
```

### 5. Button Types
```blade
<!-- Primary (Main Action) -->
<button class="btn btn-primary">Action</button>

<!-- Secondary (Alternate Action) -->
<button class="btn btn-secondary">Secondary</button>

<!-- Outline (Tertiary) -->
<button class="btn btn-outline">Outline</button>

<!-- Danger (Destructive) -->
<button class="btn btn-danger">Delete</button>

<!-- Small Size -->
<button class="btn btn-primary btn-sm">Small</button>
```

### 6. Form Section
```blade
<div class="card">
    <div class="card-header">
        <h2 class="font-semibold text-slate-900">Section Title</h2>
    </div>
    <div class="card-body space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div>
                <label class="input-label">Field Label</label>
                <input type="text" class="input" placeholder="Placeholder">
            </div>
        </div>
    </div>
</div>
```

## Module-Specific Patterns

### Attendance Module
- Use status badges: Present (green), Late (amber), Absent (red), Half-Day (yellow), Rest Day (gray)
- Display date filters at top
- Show time in/time out in table
- Use progress bars for attendance percentages

### Schedule Module
- Display day, time, and schedule type clearly
- Use calendar icon for date fields
- Show department and employee assignments
- Color-code by schedule type

### Payroll Module
- Emphasize currency (₱) clearly
- Use table for payroll summary with columns: Employee, Gross, Deductions, Net, Status
- Show status with badges (Approved, Pending, Released, On Hold)
- Create KPI card for total payroll

### Make-Up Classes Module
- Display original and make-up dates
- Show hours and rate clearly
- Use badges for status
- Include action buttons for approval

### Clearances Module
- Show clearance type, status, dates
- Use status badges (Pending, Processing, Approved, Rejected)
- Display department clearly

### Reports Module
- Create export/download buttons with icon
- Show report parameters
- Use professional table for results
- Add print-friendly layout option

## Responsive Design Principles

- Mobile: Single column, full width cards
- Tablet: 2-column grids for most layouts
- Desktop: 3-4 column grids for optimal data presentation
- Tables: Horizontal scroll on mobile/tablet, full display on desktop

## Accessibility Guidelines

1. All buttons must have clear labels (no icon-only buttons)
2. Use proper heading hierarchy (h1 > h2 > h3)
3. Links must be visually distinct and underlined when appropriate
4. Status badges should not rely only on color (include text)
5. Form labels should be associated with inputs
6. Color contrast must meet WCAG AA standards

## Interactive States

### Hover States
- Buttons: Darken by 1 shade
- Rows: Light background color (bg-slate-50)
- Links: Underline appears

### Focus States
- All interactive elements: Visible focus ring
- Outline: 2px solid indigo-500
- Offset: 2px

### Loading States
- Use spinner or skeleton loader
- Disable buttons during submission
- Show progress indication for long operations

## CSS Classes Reference

### Layout
- `.page-container` - Main content wrapper
- `.app-header` - Sticky header
- `.app-main` - Main content area
- `.sidebar` - Side navigation
- `.sidebar-link` - Navigation link
- `.sidebar-link.active` - Active state

### Cards
- `.card` - Container
- `.card-header` - Header section
- `.card-body` - Content section
- `.card-footer` - Footer section

### Typography
- `.input-label` - Form label
- `.kpi-label` - KPI label
- `.kpi-value` - Large number
- `.kpi-subtitle` - Supporting text
- `.empty-state` - Empty message container

### Tables
- `.data-table` - Table element
- `.table-head` - Header row
- `.table-head-cell` - Header cell
- `.table-body-row` - Body row
- `.table-body-cell` - Body cell

### Utilities
- `.badge` - Status indicator
- `.btn` - Button element
- `.input` - Form input
- `.skeleton` - Loading placeholder
- `.empty-state` - No data state

## Color Usage Rules

- **Indigo-600**: Primary actions, active states, links
- **Green**: Success, present, approved, go-ahead
- **Amber**: Warning, late, pending, caution
- **Red**: Danger, absent, rejected, error
- **Gray**: Neutral, rest day, disabled, secondary info

## Implementation Checklist for Each Module

- [ ] Page uses `<x-app-layout hris>` wrapper
- [ ] Page header with title and description
- [ ] Search/filter section in card
- [ ] Add button with proper icon
- [ ] Data table with status badges
- [ ] Empty state when no data
- [ ] Responsive grid layout
- [ ] Form sections properly organized
- [ ] All buttons follow design system
- [ ] Proper spacing (gap-6, mb-8, etc.)
- [ ] Icons from Heroicons (SVG)
- [ ] Consistent color usage
- [ ] Hover and focus states
- [ ] Loading states for forms

## Icons Used

All icons use Heroicons (https://heroicons.com/) in 4px stroke width:
- Dashboard: chart-bar
- Employees: users (for multiple)
- Attendance: calendar
- Time: clock
- Schedules: calendar
- Approval: check-circle
- Settings: cog
- Search: magnifying-glass
- Filter: funnel
- Add: plus
- Edit: pencil
- Delete: trash
- Download: download
- Print: printer

---

**Last Updated**: 2026-08-09
**Version**: 1.0
