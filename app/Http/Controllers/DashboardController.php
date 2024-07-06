<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
   {
       if (Auth::user()->hasRole('admin')) {
           return redirect()->route('admin.dashboard');
       } elseif (Auth::user()->hasRole('employeur')) {
           return redirect()->route('employeur.job-offers.index');
       } elseif (Auth::user()->hasRole('candidat')) {
           return redirect()->route('candidat.job-offers.index');
       }
   }

   public function adminIndex()
   {
       return view('admin.dashboard');
   }
}
