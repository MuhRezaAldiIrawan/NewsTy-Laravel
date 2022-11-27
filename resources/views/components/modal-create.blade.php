			{{-- Modal Add --}}
            <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-create">TAMBAH POST</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
            
                            <div class="form-group">
                                <label class="control-label">Judul</label>
                                <input type="text" class="form-control" id="judul">
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                            </div>
                            
            
                            <div class="form-group">
                                <label class="control-label">Foto Link</label>
                                <input class="form-control" id="foto" rows="4"></input>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-content"></div>
                            </div>

                            <div class="form-group">
                                <label  class="control-label">Web Link</label>
                                <input type="text" class="form-control" id="web">
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                            </div>
                            
            
                            <div class="form-group">
                                <label class="control-label">Link Website</label>
                                <input class="form-control" id="link" rows="4"></input>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-content"></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Kategori Berita</label>
                                <input class="form-control" id="kategori" rows="4"></input>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-content"></div>
                            </div>
            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                            <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                //button create post event
                $('body').on('click', '#btn-create-post', function () {
            
                    //open modal
                    $('#modal-create').modal('show');
                });
            
                //action create post
                $('#store').click(function(e) {
                    e.preventDefault();
            
                    //define variable
                    let judul   = $('#judul').val();
                    let foto = $('#foto').val();
                    let web   = $('#web').val();
                    let link = $('#link').val();
                    let kategori = $('#kategori').val();
                    let token   = $("meta[name='csrf-token']").attr("content");
                    
                    //ajax
                    $.ajax({
            
                        url: `/post`,
                        type: "POST",
                        cache: false,
                        data: {
                            "judul": judul,
                            "foto": foto,
                            "web": web,
                            "link": link,
                            "kategori": kategori,
                            "_token": token
                        },
                        success:function(response){
            
                            //show success message
                            Swal.fire({
                                type: 'success',
                                icon: 'success',
                                title: `${response.message}`,
                                showConfirmButton: false,
                                timer: 3000
                            });
            
                            //data post
                            let news = `
                                <tr id="index_${response.data.id}">
                                    <td>${response.data.judul}</td>
                                    <td>${response.data.foto}</td>
                                    <td>${response.data.web}</td>
                                    <td>${response.data.link}</td>
                                    <td>${response.data.kategori}</td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                                    </td>
                                </tr>
                            `;
                            
                            //append to table
                            $('#table-posts').prepend(news);
                            
                            //clear form
                            $('#judul').val('');
                            $('#foto').val('');
                            $('#web').val('');
                            $('#link').val('');
                            $('#kategori').val('');
            
                            //close modal
                            $('#modal-create').modal('hide');
                            
            
                        },
                        error:function(error){
                            
                            if(error.responseJSON.judul[0]) {
            
                                //show alert
                                $('#alert-judul').removeClass('d-none');
                                $('#alert-judul').addClass('d-block');
            
                                //add message to alert
                                $('#alert-judul').html(error.responseJSON.judul[0]);
                            } 
            
                            if(error.responseJSON.foto[0]) {
            
                                //show alert
                                $('#alert-foto').removeClass('d-none');
                                $('#alert-foto').addClass('d-block');
            
                                //add message to alert
                                $('#alert-foto').html(error.responseJSON.foto[0]);
                            } 
        
                            if(error.responseJSON.web[0]) {
            
                                //show alert
                                $('#alert-web').removeClass('d-none');
                                $('#alert-web').addClass('d-block');
        
                                //add message to alert
                                $('#alert-web').html(error.responseJSON.web[0]);
                            } 
        
                            if(error.responseJSON.link[0]) {
        
                                //show alert
                                $('#alert-link').removeClass('d-none');
                                $('#alert-link').addClass('d-block');
        
                                //add message to alert
                                $('#alert-link').html(error.responseJSON.link[0]);
                            } 
        
                            if(error.responseJSON.kategori[0]) {
        
                            //show alert
                            $('#alert-kategori').removeClass('d-none');
                            $('#alert-kategori').addClass('d-block');
        
                            //add message to alert
                            $('#alert-kategori').html(error.responseJSON.kategori[0]);
                            } 
            
                        }
            
                    });
            
                });
            
            </script>