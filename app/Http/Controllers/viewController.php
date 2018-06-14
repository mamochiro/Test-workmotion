<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewController extends Controller
{
    public function pageHome(){
      return view('home');
    }
    public function pageprojectInfo(){
      return view('projectinfo');
    }
    public function pagePlaning(){
      return view('planing');
    }
    public function pageEstimage(){
      return view('estimage');
    }
    public function pageKanbanBoard(){
      return view('kanbanboard');
    }
    public function pageDashBoard(){
      return view('dashboard');
    }
    public function pageUpload(){
      return view('upload');
    }
    public function pageListProject(){
      return view('listproject');
    }
    public function projectlist(){
      return view('projectlist');
    }
    public function pageProjectInfoRegis(){
      return view('projectInfoRegis');
    }
    public function pageAddTask(){
      return view('addTask');
    }
    /*public function pagehomeTeacher(){
      return view('homeTeacher');
    }*/
  /*  public function pageProgress(){
      return view('progress');
    }*/


}
