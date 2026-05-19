@extends('layouts.app')
    @section('title', 'Birthday Party')
    @section('content')

     <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="page-heading">
            Event Programs
        </h4>
        <a href="/league/add"
               class="btn gbsc_btn px-3 py-2 rounded-3">
               <i class="fa-solid fa-plus me-1"></i> Add
        </a>
        
    </div>
    @endsection