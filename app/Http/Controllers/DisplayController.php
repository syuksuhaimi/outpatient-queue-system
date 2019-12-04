<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DisplayRepository;

class DisplayController extends Controller
{
    protected $display;

    public function __construct(DisplayRepository $display)
    {
        $this->display = $display;
    }

    public function index()
    {
        return view('auth.clinicstaff.display', [
            'data' => $this->display->getDisplayData(),
        ]);
    }
}
