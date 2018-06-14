<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Subjects;
use App\Grades;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

            $subjects_name= array("INTRODUCTION TO COMPUTER",
                              "PROGRAMMING FUNDAMENTALS",
                              "ENGINEERING MATHEMATICS I",
                              "PHYSICS I",
                              "PHYSICS LABORATORY I",
                              "ENGLISH I",
                              "TABLE TENNIS",
                              "HUMAN RELATIONS",
                              "ELECTRIC CIRCUIT THEORY",
                              "ELECTRIC CIRCUIT LAB",
                              "ALGORITHMS AND DATA STRUCTUR",
                              "ENGINEERING MATHEMATICS II",
                              "PHYSICS II",
                              "PHYSICS LABORATORY II",
                              "ENGLISH II",
                              "BASKETBALL",
                              "DISCRETE MATHEMATICS",
                              "STATISTICS FOR COMPUTER ENGI",
                              "INTRODUCTION TO SIGNALS AND",
                              "LOGIC DESIGN OF DIGITAL SYST",
                              "DIGITAL SYSTEM DESIGN LABORA",
                              "BUILDING SOFTWARE SYSTEMS I",
                              "ENVIRONMENT AND ENERGY",
                              "BUILDING SOFTWARE SYSTEMS II",
                              "HIGH LEVEL DESIGN FOR DIGITA",
                              "COMPUTER ORGANIZATION",
                              "DATA COMMUNICATIONS",
                              "ANALOG AND DIGITAL ELECTRONI",
                              "GENERAL MATHEMATICS",
                              "PSYCHOLOGY FOR WORK",
                              "ANALOG AND DIGITAL ELECTRONI",
                              "SOFTWARE ENGINEERING",
                              "OPERATING SYSTEMS",
                              "COMPUTER NETWORKS",
                              "EMBEDDED SYSTEM DESIGN",
                              "ENGLISH CONVERSATION I",
                              "BUSINESS AND EVERYDAY LIFE",);
            $arrayWeight  = [1,2,3];
            $arraySemester = [1,2,3,4];
            $length = count($subjects_name);


             for ($i=0; $i < $length; $i++){
               $weight = array_random($arrayWeight);
               $semester = array_random($arraySemester);
               $weight = array_random($arrayWeight);
               $subject_code = rand();

               $subjects = new Subjects;
               $subjects->semester = $semester;
               $subjects->subject_code = $subject_code;
               $subjects->subject_name = $subjects_name[$i];
               $subjects->weight = $weight;
               $subjects->save();



               $grades = new Grades;
               $grades->subject_id = $subjects->id ;
               $grades->users_id = 1;
               $grades->grade = null;
               $grades->save();
               // DB::table('subjects')->insert([
               //   'semester'        => $semester,
               //   'subject_code'    => $subject_code,
               //   'subject_name'    => $subjects[$i],
               //   'created_at'      => Carbon::now()->format('Y-m-d H:i:s'),
               //   'updated_at'      => Carbon::now()->format('Y-m-d H:i:s'),
               //
               //
               //       DB::table('grade')->insert([
               //         'semester'        => $semester,
               //         'subject_code'    => $subject_code,
               //         'subject_name'    => $subjects[$i],
               //         'created_at'      => Carbon::now()->format('Y-m-d H:i:s'),
               //         'updated_at'      => Carbon::now()->format('Y-m-d H:i:s'),
               //       ]);
               // ]);


             }

    }
}
