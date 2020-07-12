@extends('layouts.master')

@section('title', 'Answer')

@section('answer', 'active')

@section('content-title', 'Majapahit Fullstack Challenge')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="position-relative p-4 bg-white shadow-sm">
    		<div class="ribbon-wrapper ribbon-lg">
        		<div class="ribbon bg-primary">Ribbon</div>
    		</div>
    		<dl>
                <dt>Apa yang anda ketahui tentang git ?</dt>
                <dd>Git adalah salah satu sistem pengontrol versi (Version Control System) pada proyek perangkat lunak yang diciptakan oleh Linus Torvalds.</dd>
                <dd>Pengontrol versi bertugas mencatat setiap perubahan pada file proyek yang dikerjakan oleh banyak orang maupun sendiri.</dd>
                <dt>Apa yang Anda ketahui tentang Relasi Table dalam database?</dt>
                <dd>Relasi table dalam database berguna untuk menghubungkan satu data dengan data lainnya, yang mempunyai keterkaitan data satu sama lain.</dd>
                <dt>Apa yang Anda ketahui tentang OOP ?</dt>
                <dd>OOP (Object Oriented Programming) adalah suatu metode pemrograman yang berorientasi kepada objek.</dd>
                <dt>Apa yang Anda ketahui tentang REST API ?</dt>
                <dd>REST API merupakan gaya arsitektur dan pendekatan komunikasi yang sering digunakan dalam pengembangan layanan web.</dd>
                <dt>Security apa saja yang bisa digunakan dalam REST API ?</dt>
                <dd>JWT</dd>
            </dl>
		</div>
	</div>
</div>
@endsection