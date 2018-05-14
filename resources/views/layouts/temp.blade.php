// $(document).ready( function () {
    //   $('#table_target_donasi').DataTable();
    // } );

    // memformat angka ribuan
    // function formatAngka(angka) {
    //   if (typeof(angka) != 'string') angka = angka.toString();
    //   var reg = new RegExp('([0-9]+)([0-9]{3})');
    //   while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
    //   return angka;
    // }

    // tambah event keypress untuk input bayar
    // $('#target-donasi').on('keypress', function(e) {
    //  var c = e.keyCode || e.charCode;
    //  switch (c) {
    //   case 8: case 9: case 27: case 13: return;
    //   case 65:
    //    if (e.ctrlKey === true) return;
    //  }
    //  if (c < 48 || c > 57) e.preventDefault();
    // }).on('keyup', function() {
    //  var inp = $(this).val().replace(/\./g, '');
      
    //  // set nilai ke variabel bayar
    //  bayar = new Number(inp);
    //  $(this).val(formatAngka(inp));
      
    // });

    // $(document).ready( function () {
    //   // Edit a post
    //     $(document).on('click', '.editBarang', function() {
            
    //         $('#namaBarangEdit').val($(this).data('nama_barang'));
    //         $('#jumlahBarangEdit').val($(this).data('target_jumlah'));
    //         $('#satuanEdit').val($(this).data('satuan'));
    //         id = $('#id_campaign_user').val();
    //         $('#modalEditData').modal('show');
    //     });
      // $('.ourItem1').each(function(){
      //   $('#editBarang').click(function(event){
      //     var text1 = $('.ourItem1').text();
      //     var text2 = $('.ourItem2').text();
      //     var text3 = $('.ourItem3').text();
      //     $('#namaBarangEdit').val(text1);
      //     $('#jumlahBarangEdit').val(text2);
      //     $('#satuanEdit').val(text3);
      //     console.log(text1);
      //     console.log(text2);
      //     console.log(text3);
      //   })
      // });
      // $('#editBarang').click(function(event){
      //   $('.ourItem').each(function(){
      //     var text1 = $(this'.ourItem1').text();
      //     var text2 = $(this'.ourItem2').text();
      //     var text3 = $(this'.ourItem3').text();
      //     $('#namaBarangEdit').val(text1);
      //     $('#jumlahBarangEdit').val(text2);
      //     $('#satuanEdit').val(text3);
      //     console.log(text1);
      //     console.log(text2);
      //     console.log(text3);
      //   })
      // });
    //   $('.ourItem1').each(function(){
    //     $(this).click(function(event){
    //       var text1 = $(this).text();
          
    //       $('#namaBarang1').val(text1);
    //       $('#modalDataLabelc').text('Edit Item');
    //       $('#saveChange').show('400');
    //       $('#delete').show('400');
    //       $('#tambah').hide('400');

    //       console.log(text1);
    //     });

    //     $('#tambahData').click(function(event){
          
    //       $('#namaBarang1').val("");
    //       $('#modalDataLabelc').text('Add New Item');
    //       $('#saveChange').hide('400');
    //       $('#delete').hide('400');
    //       $('#tambah').show('400');
    //     });

    //     $('#tambah').click(function(event){
          
    //       var text = $('#namaBarang1').val();

    //       $.post('list', {'text':text, '_token':$('input[name=_token]').val()}, function(data){
    //         console.log(data);
    //       });
          
    //     });

    //     $('#tambahDataBarang').click(function(){
          
    //       var data = $('.form_tambah_barang').serialize();

    //       $.ajax({
    //         type: 'POST',
    //         url: "{{ URL::'/tambahBarang' }}",
    //         data: {
    //           '_token': $('input[name=_token]').val() 
    //           },
    //         success: function(data) {
    //                     // empty
    //         },
    //       });
          
    //     });

    //   });
    // } );