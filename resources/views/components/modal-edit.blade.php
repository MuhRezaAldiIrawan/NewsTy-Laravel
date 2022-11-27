<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT POST</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="id_edit">

                <div class="form-group">
                    <label for="name" class="control-label">Judul</label>
                    <input type="text" class="form-control" id="judul-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title-edit"></div>
                </div>
                

                <div class="form-group">
                    <label class="control-label">foto</label>
                    <input class="form-control" id="foto-edit" rows="4"></input>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-content-edit"></div>
                </div>

                <div class="form-group">
                    <label  class="control-label">web</label>
                    <input type="text" class="form-control" id="web-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title-edit"></div>
                </div>
                

                <div class="form-group">
                    <label class="control-label">link</label>
                    <input class="form-control" id="link-edit" rows="4"></input>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-content-edit"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">kategori</label>
                    <input class="form-control" id="kategori-edit" rows="4"></input>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-content-edit"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary edit" id="update">UPDATE</button>
            </div>
        </div>
    </div>
</div>


                <script>
                      $(document).on('click', '.show-modal', function() {
                        $('.modal-title').text('Show');
                        $('#id_edit').val($(this).data('id'));
                        $('#judul-edit').val($(this).data('judul'));
                        $('#foto-edit').val($(this).data('foto'));
                        $('#web-edit').val($(this).data('web'));
                        $('#link-edit').val($(this).data('link'));
                        $('#kategori-edit').val($(this).data('kategori'));
                        $('#modal-edit').modal('show');
                    });

                     // Edit a post
                        $(document).on('click', '.edit-modal', function() {
                            $('.modal-title').text('Edit');
                            $('#id_edit').val($(this).data('id'));
                            $('#judul-edit').val($(this).data('judul'));
                            $('#foto-edit').val($(this).data('foto'));
                            $('#web-edit').val($(this).data('web'));
                            $('#link-edit').val($(this).data('link'));
                            $('#kategori-edit').val($(this).data('kategori'));
                            id = $('#id-edit').val();
                            $('#modal-edit').modal('show');
                        });
                        $('.modal-footer').on('click', '.edit', function() {
                            $.ajax({
                                type: 'PUT',
                                url: 'post/' + id,
                                data: {
                                    '_token': $('input[name=_token]').val(),
                                    'id': $("#id-edit").val(),
                                    'judul': $('#judul-edit').val(),
                                    'foto': $('#foto-edit').val()
                                    'web': $("#web-edit").val(),
                                    'link': $('#link-edit').val(),
                                    'kategori': $('#kategori-edit').val()
                                },
                                success: function(data) {
                                    $('.errorTitle').addClass('hidden');
                                    $('.errorContent').addClass('hidden');

                                    if ((data.errors)) {
                                        setTimeout(function () {
                                            $('#modal-edit').modal('show');
                                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                                        }, 500);

                                        if (data.errors.judul) {
                                            $('.errorTitle').removeClass('hidden');
                                            $('.errorTitle').text(data.errors.judul);
                                        }
                                        if (data.errors.foto) {
                                            $('.errorContent').removeClass('hidden');
                                            $('.errorContent').text(data.errors.foto);
                                        }
                                        if (data.errors.web) {
                                            $('.errorTitle').removeClass('hidden');
                                            $('.errorTitle').text(data.errors.web);
                                        }
                                        if (data.errors.link) {
                                            $('.errorContent').removeClass('hidden');
                                            $('.errorContent').text(data.errors.link);
                                        }
                                        if (data.errors.kategori) {
                                            $('.errorContent').removeClass('hidden');
                                            $('.errorContent').text(data.errors.kategori);
                                        }
                                    } else {
                                        toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
                                        $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td class='col1'>" + data.id + "</td><td>" + data.judul + "</td><td>" + data.foto + "</td><td class='text-center'><input type='checkbox' class='edit_published' data-id='" + data.id + "'></td><td>Right now</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                
                                        $('.col1').each(function (index) {
                                            $(this).html(index+1);
                                        });
                                    }
                                }
                            });
                        });
            
                    //action update posttoke++
                    // $('#update').click(function(e) {
                    //     e.preventDefault();
            
                    //     //define variable
                    //     let id = $('#id').val();
                    //     let judul   = $('#judul').val();
                    //     let foto = $('#foto').val();
                    //     let web   = $('#web').val();
                    //     let link = $('#link').val();
                    //     let kategori = $('#kategori').val();
                    //     let token   = $("meta[name='csrf-token']").attr("content");
                        
                    //     //ajax
                    //     $.ajax({
            
                    //         url: `/post/${id}`,
                    //         type: "PUT",
                          
                    //         cache: false,
                    //         data: {
                    //             "judul": judul,
                    //             "foto": foto,
                    //             "web": web,
                    //             "link": link,
                    //             "kategori": kategori,
                    //             "_token": "{{ csrf_token() }}"
                    //         },
                    //         success:function(response){
            
                    //             //show success message
                    //             Swal.fire({
                    //                 type: 'success',
                    //                 icon: 'success',
                    //                 title: `${response.message}`,
                    //                 showConfirmButton: false,
                    //                 timer: 3000
                    //             });
            
                    //             //data post
                    //             let news = `
                    //                 <tr id="index_${response.data.id}">
                    //                     <td>${response.data.judul}</td>
                    //                     <td>${response.data.foto}</td>
                    //                     <td>${response.data.web}</td>
                    //                     <td>${response.data.link}</td>
                    //                     <td>${response.data.kategori}</td>
                    //                     <td class="text-center">
                    //                         <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                    //                         <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                    //                     </td>
                    //                 </tr>
                    //             `;
                                
                    //             //append to post data
                    //             $(`#index_${response.data.id}`).replaceWith(news);
            
                    //             //close modal
                    //             $('#modal-edit').modal('hide');
                                
            
                    //         },
                    //         error:function(error){
                                
                    //             if(error.responseJSON.title[0]) {
            
                    //                 //show alert
                    //                 $('#alert-title-edit').removeClass('d-none');
                    //                 $('#alert-title-edit').addClass('d-block');
            
                    //                 //add message to alert
                    //                 $('#alert-title-edit').html(error.responseJSON.title[0]);
                    //             } 
            
                    //             if(error.responseJSON.content[0]) {
            
                    //                 //show alert
                    //                 $('#alert-content-edit').removeClass('d-none');
                    //                 $('#alert-content-edit').addClass('d-block');
            
                    //                 //add message to alert
                    //                 $('#alert-content-edit').html(error.responseJSON.content[0]);
                    //             } 
            
                    //         }
            
                    //     });
            
                    // });
            
                </script>