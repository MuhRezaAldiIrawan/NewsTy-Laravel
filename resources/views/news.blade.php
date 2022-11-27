<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>NewsTy</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- FontAwesome JS-->
    <script defer src="fontawesome/js/all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

    <!-- Theme CSS -->  
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/glightbox.min.css" />
	<link rel="stylesheet" href="css/home.css" />
    <link id="theme-style" rel="stylesheet" href="css/theme.css">

</head> 

<body class="docs-page">    
    <header class="header fixed-top ">	    
        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2">
                <div class="docs-logo-wrapper ">
	                <div class="site-logo">
						<a class="navbar-brand" href="/"><span class="logo-text">NewsTy</span></a>
					</div>    
                </div><!--//docs-logo-wrapper-->
            </div><!--//container-->
        </div><!--//branding-->
    </header><!--//header-->
    
    
    <div class="docs-wrapper">
	    <div id="docs-sidebar" class="docs-sidebar">
		    <nav id="docs-nav" class="docs-nav navbar">
			    <ul class="section-items list-unstyled nav flex-column pb-3">
				    <li class="nav-item section-title"><a class="nav-link scrollto active" href="#section-1"><span class="theme-icon-holder me-2"><i class="fas fa-map-signs"></i></span>NewsTy API</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-1-1">Aturan API KEY</a></li>
					<li class="nav-item"><a class="nav-link scrollto" href="#item-1-2">Daftar Kategori</a></li>
				    <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#section-2"><span class="theme-icon-holder me-2"><i class="fas fa-arrow-down"></i></span>User API</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-2-1">API KEY</a></li>
				    <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#section-8"><span class="theme-icon-holder me-2"><i class="fas fa-lightbulb"></i></span>Dokumentasi</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-9-1">Get All Data</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-9-2">Search Kategori</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#item-9-3">Search Title</a></li>
					<li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="../auth/login.php"><span class="theme-icon-holder me-2"><i class="fas fa-lightbulb"></i></span>Login</a></li>
			    </ul>

		    </nav><!--//docs-nav-->
	    </div><!--//docs-sidebar-->
	    <div class="docs-content">
		    <div class="container">
			    <article class="docs-article" id="section-1">
				    <header class="docs-header">
					    <section class="docs-intro">
						    <p>NewSty menyajikan berita terupdate lokal, nasional, internasional, ekonomi dan olahraga. menghadirkan jurnalisme yang mengedepankan proses klarifikasi, pengecekan, dan uji silang sebelum artikel diterbitkan sehingga berita yang diterbitkn dapat dibuktikan keaslian dan bukan Hoax .</p>
						</section><!--//docs-intro-->

						<section class="docs-section" id="item-1-1">
							<h2 class="section-heading">Example Breaking News</h2>              
						</section>

						<section class="docs-section" id="item-1-2">
							<h2 class="section-heading">Daftar Breaking News</h2>
							<div class="d-flex justify-content-end">
								<a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-post">TAMBAH</a>
							</div>
							<div class="table-responsive text-nowrap">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Judul</th>
                                        <th scope="col">foto</th>
										<th scope="col">web</th>
                                        <th scope="col">link</th>
                                        <th scope="col">kategori</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($newsty as $nw)
									<tr id="index{{ $nw->id }}">
										<td>{{ $nw->id }}</td>
										<td>{{ $nw->judul }}</td>
                                        <td>{{ $nw->foto }}</td>
										<td>{{ $nw->web }}</td>
                                        <td>{{ $nw->link }}</td>
										<td>{{ $nw->kategori }}</td>
										<td class="text-start">
											{{-- <a href="javascript:void(0)" id="btn-edit-show" data-id="{{ $nw->id }}" data-judul="{{$nw->judul}}" data-foto="{{$nw->foto}}"  data-web="{{$nw->web}}" data-link="{{$nw->link}}" data-kategori="{{$nw->kategori}}" class="show-modal btn btn-primary btn-sm">SHOW</a> --}}
											<a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $nw->id }}" data-judul="{{$nw->judul}}" data-foto="{{$nw->foto}}"  data-web="{{$nw->web}}" data-link="{{$nw->link}}" data-kategori="{{$nw->kategori}}" class="edit-modal btn btn-primary btn-sm">EDIT</a>
											<a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $nw->id }}" class="btn btn-danger btn-sm">DELETE</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						
							</div>       
						</section>
				    </header>				
			    </article>
				@include('components.modal-create')
				@include('components.modal-edit')
		
						
			
			    <footer class="footer">
				    <div class="container text-center py-5">
			            <small class="copyright">Made By Anything Can Do <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="theme-link" href="http://themes.3rdwavemedia.com" target="_blank">Kelompok 7</a> for developers</small>
				    </div>
			    </footer>
		    </div> 
	    </div>
    </div><!--//docs-wrapper-->
   
    
    <!-- Page Specific JS -->
	<script src="js/bootstrap.bundle.min.js"></script>
  	<script src="js/main.js"></script>
    <script src="js/highlight-custom.js"></script> 
    <script src="js/docs.js"></script> 



</body>
</html> 

