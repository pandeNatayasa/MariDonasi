
  <thead style="background-color: black;">
    <tr>
      <th style="color: #fff;">No</th>
      <th style="color: #fff;">Nama Barang</th>
      <th style="color: #fff;">Target Donasi Barang</th>
      <th style="color: #fff;">Satuan</th>
      <th style="color: #fff;">Status</th>
    </tr>
  </thead>
  <tbody class="dataBaru" id="dataBaru">
    <?php $no=0;?>
    @foreach($dataBarang as $i => $data)
    <tr >
      <td>{{$no=$no+1}}</td>
      <td >{{$data->nama_barang}}</td>

      <td >{{$data->target_jumlah}}</td>
      <td >{{$data->satuan}}</td>
      <td>
        <button id="editBarang" class="btn btn-primary " data-toggle="modal" data-target="#modalEditData_{{$data->id}}">
          <i class="fa fa-edit"></i>
        </button>
        <!-- Modal Edit Data-->
            <div class="modal fade" id="modalEditData_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalEditDataLabel">Edit Data Donasi Barang</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <!-- <form method="post" action="{{route('campaign_user_barang.store')}}" class="form_tambah_barang" data-toggle="validator">
                  {{csrf_field()}} -->
                    <div class="modal-body">
                      <div class="row">
                        <label class="control-label col-md-3">Nama Barang</label>
                        <div class="col-md-9">
                          <input class="form-control" placeholder="Nama Barang yang diminta" name="namaBarangEdit" required="required" type="text" value="{{$data->nama_barang}}" id="namaBarangEdit">
                          <input type="hidden" name="id_donasi_barang" id="id_donasi_barang" value="{{$data->id}}">
                        </div>
                      </div>
                      <div class="row">
                        <label class="control-label col-md-3">Jumlah Barang</label>
                        <div class="col-md-9">
                          <input class="form-control" placeholder="Jumlah Barang yang diminta" name="jumlahBarangEdit" required="required" type="text" value="{{$data->target_jumlah}}" id="jumlahBarangEdit">
                        </div>
                      </div>
                      <div class="row">
                        <label class="control-label col-md-3">Satuan</label>
                        <div class="col-md-9">
                          <select name="satuanEdit" class="form-control" required="required" id="satuanEdit">
                            <option value="" disabled selected>Pilih Satuan Barang</option>
                            if($data->satuan == 'lusin' )
                              <option selected value="Lusin">Lusin</option>
                            elseif($data->satuan == 'Meter')
                              <option selected value="Meter">Meter</option> 
                            elseif($data->satuan == 'Dus')
                              <option selected value="Dus">Dus</option>
                            elseif($data->satuan == 'Buah')
                              <option selected value="Buah">Buah</option>
                            endif
                           <!--  <option value="Lusin">Lusin</option>
                            <option value="Meter">Meter</option> 
                            <option value="Dus">Dus</option>
                            <option value="Buah">Buah</option> -->  
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <button  type="submit" class="btn btn-primary" id="save-change" href="">Save Change</button>
                    </div>
                  <!-- </form> -->
                </div>
              </div>
            </div>
        
        <button class="btn btn-danger " data-toggle="modal" data-target="#modalDelete_{{$data->id}}">
          <i class="fa fa-trash"></i>
        </button>
          <!-- Modal Edit Data-->
           <div class="modal fade" id="modalDelete_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title col-md-12" id="modalDataLabelc">Delete Data Donasi Barang</h5>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     
                   </button>
                   <span class="col-md-12">Apakah Anda yakin ingin mendelete data:</span>
                 </div>
                 <!-- form method="POST" class="form-horizontal" data-toggle="validator">
                 {{csrf_field()}} {{method_field('POST')}} -->
                   <div class="modal-body">
                      <div class="row">
                        <label class="control-label col-md-3">Nama Barang</label>
                        <div class="col-md-9">
                          <input class="form-control" placeholder="Nama Barang yang diminta" name="namaBarangEdit" required="required" disabled type="text" value="{{$data->nama_barang}}" id="namaBarangEdit">
                          <input type="hidden" name="id_donasi_barang" id="id_donasi_barang" value="{{$data->id}}">
                        </div>
                      </div>
                      <div class="row">
                        <label class="control-label col-md-3">Jumlah Barang</label>
                        <div class="col-md-9">
                          <input class="form-control" placeholder="Jumlah Barang yang diminta" name="jumlahBarangEdit" required="required" disabled type="text" value="{{$data->target_jumlah}}" id="jumlahBarangEdit">
                        </div>
                      </div>
                      <div class="row">
                        <label class="control-label col-md-3">Satuan</label>
                        <div class="col-md-9">
                          <select name="satuanEdit" disabled class="form-control" required="required" id="satuanEdit">
                            <option value="" disabled selected>Pilih Satuan Barang</option>
                            if($data->satuan == 'lusin' )
                              <option disabled selected value="Lusin">Lusin</option>
                            elseif($data->satuan == 'Meter')
                              <option disabled selected value="Meter">Meter</option> 
                            elseif($data->satuan == 'Dus')
                              <option disabled selected value="Dus">Dus</option>
                            elseif($data->satuan == 'Buah')
                              <option disabled selected value="Buah">Buah</option>
                            endif
                           <!--  <option value="Lusin">Lusin</option>
                            <option value="Meter">Meter</option> 
                            <option value="Dus">Dus</option>
                            <option value="Buah">Buah</option> -->  
                          </select>
                        </div>
                      </div>
                    </div>
                   <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                      <button type="submit" id="delete" class="btn btn-danger" data-dismiss="modal" >Delete</button>
                   </div>
                 <!-- </form> -->
               </div>
             </div>
           </div>
         <!-- End of modal hapus data -->
      </td>
    </tr>
    @endforeach
  </tbody>
<!--     <script src="{{asset('/lib/jquery/jquery-3.3.1.min.js')}}"></script> -->
  <!-- <script type="text/javascript">
    $("#save-change").click(function(){
      var id_donasi_barang = $("#id_donasi_barang").val();
      var nama_barang = $("#namaBarangEdit").val();
      var target_jumlah = $("#targetJumlahEdit").val();
      var satuan = $("#satuanEdit").val();
      // var token = '{{csrf_token()}}';

      // console.log(nama_barang);

      $.ajax({
        type: "POST",
        // data: "id_campaign_user=" + id_campaign_user + "&nama_barang" + nama_barang + "&target_jumlah" + target_jumlah + "&satuan" + satuan + "&_token" + token,
        data: { id_donasi_barang: id_donasi_barang, nama_barang: nama_barang, target_jumlah: target_jumlah, satuan: satuan , _token: '{{csrf_token()}}' },
        url: "<?php echo url('/campaign/edit-barang')?>",
        success:function(data){
          ///console.log(data);
          // $('#tableBarang').load(location.href + ' #tableBarang')
          loadComment();
        }
      });
  </script> -->