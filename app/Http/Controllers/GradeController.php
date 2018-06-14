<?php

namespace App\Http\Controllers;

use App\Project;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Grades;
use App\Subjects;
class GradeController extends Controller
{

      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index(Request $request)
      {
          $semester = $request->semeter;
          $grade =  DB::table('grades')
                ->join('subjects', 'subjects.id', '=', 'grades.subject_id')
                ->select('subjects.*', 'grades.grade', 'subjects.weight')
                ->where('users_id', Auth::id())
                ->where('subjects.semester' , $semester);

          $gradeLists = $grade->get();


          //for calculate
          $semester1 = $grade->select(DB::raw('SUM(subjects.weight) as total_weigth') , DB::raw('SUM(subjects.weight  * grades.grade) as total_point'))
          ->where('subjects.semester' , $semester)
          ->get();
          // echo $semester1 ;
          $sumCredit =  0 ;
          foreach ($gradeLists as $gradeList){
            $sumCredit = $sumCredit +  $gradeList->weight;
          }

          return view('gradelist' , ['gradeLists' => $gradeLists ,
                                     'sumCredit' => $sumCredit,
                                     'semester'   => $semester ,
                                   ]);
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          //
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
          //
      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
        $semester = $id;
        $grade =  DB::table('grades')
              ->join('subjects', 'subjects.id', '=', 'grades.subject_id')
              ->select('subjects.*', 'grades.grade', 'subjects.weight')
              ->where('users_id', Auth::id())
              ->where('subjects.semester' , $semester);

        $gradeLists = $grade->get();


        //for calculate
        // $semester1 = $grade->select(DB::raw('SUM(subjects.weight) as total_weigth') , DB::raw('SUM(subjects.weight  * grades.grade) as total_point'))
        // ->where('subjects.semester' , $semester)
        // ->get();
        // echo $semester1 ;
        $sumCredit =  0 ;
        $sumPoint = 0 ;
        $pointUse = 0 ;
        $sumCreditCal =  0 ;
        $sumPointCal = 0 ;
        $pointUseCal = 0 ;
        $totalSumPoint = 0 ;
        $totalPointUse = 0 ;
        $totalSumCredit = 0 ;

        foreach ($gradeLists as $gradeList){
          $sumCredit = $sumCredit +  $gradeList->weight;
          if ($gradeList->grade == 'A'){
            $sumPoint = $sumPoint + (4 * $gradeList->weight) ;
            $pointUse = $pointUse +  $gradeList->weight;
          }elseif ($gradeList->grade == 'B+') {
            $sumPoint = $sumPoint + (3.5 * $gradeList->weight) ;
            $pointUse = $pointUse +  $gradeList->weight;
          }elseif ($gradeList->grade == 'B') {
            $sumPoint = $sumPoint + (3 * $gradeList->weight) ;
            $pointUse = $pointUse +  $gradeList->weight;
          }elseif ($gradeList->grade == 'C+') {
            $sumPoint = $sumPoint + (2.5 * $gradeList->weight) ;
            $pointUse = $pointUse +  $gradeList->weight;
          }elseif ($gradeList->grade == 'C') {
            $sumPoint = $sumPoint + (2 * $gradeList->weight) ;
            $pointUse = $pointUse +  $gradeList->weight;
          }elseif ($gradeList->grade == 'D+') {
            $sumPoint = $sumPoint + (1.5 * $gradeList->weight) ;
            $pointUse = $pointUse +  $gradeList->weight;
          }elseif ($gradeList->grade == 'D') {
            $sumPoint = $sumPoint + (1 * $gradeList->weight) ;
            $pointUse = $pointUse +  $gradeList->weight;
          }elseif ($gradeList->grade == 'F') {
            $sumPoint = $sumPoint + (0 * $gradeList->weight) ;
            $pointUse = $pointUse +  $gradeList->weight;
          }
        }

      for ($i=1; $i <= $semester ; $i++) {
        $gradeCal =  DB::table('grades')
              ->join('subjects', 'subjects.id', '=', 'grades.subject_id')
              ->select('subjects.*', 'grades.grade', 'subjects.weight')
              ->where('users_id', Auth::id())
              ->where('subjects.semester' , $i);

        $gradeListcals = $gradeCal->get();
        foreach ($gradeListcals as $gradeListcal){
          $sumCreditCal = $sumCreditCal +  $gradeListcal->weight;
          // echo $sumCreditCal;
          if ($gradeListcal->grade == 'A'){
            $sumPointCal = $sumPointCal + (4 * $gradeListcal->weight) ;
            $pointUseCal = $pointUseCal +  $gradeListcal->weight;
          }elseif ($gradeListcal->grade == 'B+') {
            $sumPointCal = $sumPointCal + (3.5 * $gradeListcal->weight) ;
            $pointUseCal = $pointUseCal +  $gradeListcal->weight;
          }elseif ($gradeListcal->grade == 'B') {
            $sumPointCal = $sumPointCal + (3 * $gradeListcal->weight) ;
            $pointUseCal = $pointUseCal +  $gradeListcal->weight;
          }elseif ($gradeListcal->grade == 'C+') {
            $sumPointCal = $sumPointCal + (2.5 * $gradeListcal->weight) ;
            $pointUseCal = $pointUseCal +  $gradeListcal->weight;
          }elseif ($gradeListcal->grade == 'C') {
            $sumPointCal = $sumPointCal + (2 * $gradeListcal->weight) ;
            $pointUseCal = $pointUseCal +  $gradeListcal->weight;
          }elseif ($gradeListcal->grade == 'D+') {
            $sumPointCal = $sumPointCal + (1.5 * $gradeListcal->weight) ;
            $pointUseCal = $pointUseCal +  $gradeListcal->weight;
          }elseif ($gradeListcal->grade == 'D') {
            $sumPointCal = $sumPointCal + (1 * $gradeListcal->weight) ;
            $pointUseCal = $pointUseCal +  $gradeListcal->weight;
          }elseif ($gradeListcal->grade == 'F') {
            $sumPointCal = $sumPointCal + (0 * $gradeListcal->weight) ;
            $pointUseCal = $pointUseCal +  $gradeListcal->weight;
          }
        }
        // $totalSumCredit  = $totalSumCredit + $sumCreditCal ;
        // $totalSumPoint  = $totalSumPoint + $sumPointCal ;
        // $totalPointUse  = $totalPointUse + $pointUseCal ;
      }
        // echo $sumCreditCal ."<br>" ;
        // echo $sumPointCal ."<br>" ;
        // echo $pointUseCal ."<br>" ;
        if ($pointUse !=0 ) {
          // code...
          $GPS = $sumPoint / $pointUse ;
        }else{
          $GPS = 0 ;
        }

        if ($pointUseCal !=0 ) {
          // code...
          $GPA = $sumPointCal / $pointUseCal ;
        }else{
          $GPA = 0 ;
        }


        return view('gradelist' , ['gradeLists' => $gradeLists ,
                                   'sumCredit'  => $sumCredit,
                                   'semester'   => $semester ,
                                   'sumPoint'   => $sumPoint ,
                                   'GPS'        => $GPS,
                                   'sumCreditCal' => $sumCreditCal,
                                   'sumPointCal' => $sumPointCal,
                                   'pointUseCal' => $pointUseCal,
                                   'GPA' => $GPA

                                 ]);
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
          //
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request)
      {
          //

          $id    =  $request->id;
          $grade =  $request->grade;
          if ($grade !== 'A' &&
          $grade!== 'B+' &&
          $grade !== 'C' &&
          $grade!== 'C+' &&
          $grade!== 'D' &&
          $grade!=='D+' &&
          $grade!=='D' &&
          $grade!== 'F') {
            // code...
          return back()->with('warning', 'plese check input');
          }else{
          $grades = Grades::find($id);
          $grades->grade = $grade;
          $grades->save();
          return back()->with('success', 'Update Success');
        }


      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
          //
      }
}
