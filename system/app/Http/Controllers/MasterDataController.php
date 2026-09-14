<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Room;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function index()
    {
        return view('masterdata.index', [
            'courses' => Course::orderBy('code')->get(),
            'subjects' => Subject::orderBy('code')->get(),
            'rooms' => Room::orderBy('code')->get(),
            'schoolYears' => SchoolYear::with('semesters')->orderByDesc('start_date')->get(),
            'semesters' => Semester::with('schoolYear')->orderByDesc('start_date')->get(),
        ]);
    }

    public function storeCourse(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:courses,code',
            'name' => 'required',
            'description' => 'nullable',
            'total_units' => 'nullable|numeric|min:0',
        ]);
        Course::create($request->only(['code', 'name', 'description', 'total_units']));

        return back()->with('success', 'Course added.');
    }

    public function destroyCourse(Course $course)
    {
        $course->delete();

        return back()->with('success', 'Course deleted.');
    }

    public function storeSubject(Request $request)
    {
        $request->validate(['code' => 'required|unique:subjects,code', 'name' => 'required', 'units' => 'nullable|numeric|min:0']);
        Subject::create($request->only(['code', 'name', 'units']));

        return back()->with('success', 'Subject added.');
    }

    public function destroySubject(Subject $subject)
    {
        $subject->delete();

        return back()->with('success', 'Subject deleted.');
    }

    public function storeRoom(Request $request)
    {
        $request->validateWithBag('room', [
            'code' => 'required|unique:rooms,code',
            'name' => 'required',
            'building' => 'nullable',
            'capacity' => 'nullable|integer|min:1',
        ]);
        Room::create($request->only(['code', 'name', 'building', 'capacity']));

        return back()->with('success', 'Room added.');
    }

    public function destroyRoom(Room $room)
    {
        $room->delete();

        return back()->with('success', 'Room deleted.');
    }

    public function storeSchoolYear(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:school_years,name',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
        SchoolYear::create($request->only(['name', 'start_date', 'end_date']));

        return back()->with('success', 'School year added.');
    }

    public function activateSchoolYear(SchoolYear $schoolYear)
    {
        SchoolYear::where('id', '!=', $schoolYear->id)->update(['is_active' => false]);
        $schoolYear->update(['is_active' => true]);

        return back()->with('success', 'School year activated.');
    }

    public function storeSemester(Request $request)
    {
        $request->validate([
            'school_year_id' => 'required|exists:school_years,id',
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
        Semester::create($request->only(['school_year_id', 'name', 'start_date', 'end_date']));

        return back()->with('success', 'Semester added.');
    }

    public function activateSemester(Semester $semester)
    {
        Semester::where('id', '!=', $semester->id)->update(['is_active' => false]);
        $semester->update(['is_active' => true]);

        return back()->with('success', 'Semester activated.');
    }
}
