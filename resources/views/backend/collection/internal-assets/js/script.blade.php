<script>
    var datatable= $('#datatable').DataTable({
    processing:true,
    serverSide:true,
    ajax:{
      url:"{{route('collection.create')}}"
    },
    columns:[
      {
        data:'DT_RowIndex',
        name:'DT_RowIndex',
        orderable:false,
        searchable:false
      },
      {
        data:'name',
        name:'name',
      },
      {
        data:'total',
        name:'total',
      },
      {
        data:'adress',
        name:'adress',
      },
      {
        data:'action',
        name:'action',
      }
    ]
});

window.formRequest= function(){
    $('input,select').removeClass('is-invalid');
    let donor=$('#donor').val();
    let sostoyoni=$('#sostoyoni').val();
    let istovriti=$('#istovriti').val();
    let dokkhina=$('#dokkhina').val();
    let songothoni=$('#songothoni').val();
    let pronami=$('#pronami').val();
    let advertisement=$('#advertisement').val();
    let mandir_construction=$('#mandir_construction').val();
    let various=$('#various').val();
    let rittiki = $("select[name='rittiki[]']")
                  .map(function(){return $(this).val();}).get();
    let rittiki_ammount = $("input[name='rittiki_ammount[]']")
                  .map(function(){return $(this).val();}).get();
    console.log(donor,sostoyoni,istovriti,dokkhina,songothoni,pronami,advertisement,mandir_construction,various,rittiki,rittiki_ammount);
 
    let id=$('#id').val();
    let formData= new FormData();
    formData.append('donor',donor);
    formData.append('sostoyoni',sostoyoni);
    formData.append('istovriti',istovriti);
    formData.append('dokkhina',dokkhina);
    formData.append('songothoni',songothoni);
    formData.append('pronami',pronami);
    formData.append('advertisement',advertisement);
    formData.append('mandir_construction',mandir_construction);
    formData.append('various',various);
    formData.append('rittiki',rittiki);
    formData.append('rittiki_ammount',rittiki_ammount);
    $('#exampleModalLabel').text('কালেকশন হালনাগাত করুন');
    if(id!=''){
      formData.append('_method','PUT');
    }
    //axios post request
    if (id==''){
         axios.post("{{route('collection.store')}}",formData)
        .then(function (response){
            if(response.data.message){
                toastr.success(response.data.message)
                datatable.ajax.reload();
                clear();
                $('#exampleModal').modal('hide');
            }else if(response.data.error){
              var keys=Object.keys(response.data.error);
              keys.forEach(function(d){
                $('#'+d).addClass('is-invalid');
                $('#'+d+'_msg').text(response.data.error[d][0]);
              })
            }
        })
    }else{
      axios.post("{{URL::to('collection/')}}/"+id,formData)
        .then(function (response){
          if(response.data.message){
              toastr.success(response.data.message);
              datatable.ajax.reload();
              clear();
          }else if(response.data.error){
              var keys=Object.keys(response.data.error);
              keys.forEach(function(d){
                $('#'+d).addClass('is-invalid')
                $('#'+d+'_msg').text(response.data.error[d][0]);
              })
            }
        })
    }
}
$(document).delegate("#modalBtn", "click", function(event){
    clear();
    $('#exampleModalLabel').text('নতুন কালেকশন যুক্ত করুন');

});
$(document).delegate(".editRow", "click", function(){
    $('#exampleModalLabel').text('কালেকশন হালনাগাত করুন');
    let route=$(this).data('url');
    axios.get(route)
    .then((data)=>{
      var editKeys=Object.keys(data.data);
      editKeys.forEach(function(key){
        if(key=='name'){
          $('#'+'name').val(data.data[key]);
        }
        if(key=='category_id'){
          $('#category').val(data.data[key]).niceSelect('update');
        }
         $('#'+key).val(data.data[key]);
         $('#exampleModal').modal('show');
         $('#id').val(data.data.id);
      })
    })
});
$(document).delegate(".deleteRow", "click", function(){
    let route=$(this).data('url');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value==true) {
        axios.delete(route)
        .then((data)=>{
          if(data.data.message){
            toastr.success(data.data.message);
            datatable.ajax.reload();
          }else if(data.data.warning){
            toastr.error(data.data.warning);
          }
        })
      }
    })
});
function clear(){
  $("input").removeClass('is-invalid').val('');
  $(".invalid-feedback").text('');
  $('form select').val('').niceSelect('update');
}

// $('#donor').select2({
//   'theme':'bootstrap4',
// })

$('#donor').select2({
    theme:'bootstrap4',
    placeholder:'select',
    allowClear:true,
    ajax:{
      url:"{{URL::to('/get-donor')}}",
      type:'post',
      dataType:'json',
      delay:20,
      data:function(params){
        return {
          searchTerm:params.term,
          _token:"{{csrf_token()}}",
          }
      },
      processResults:function(response){
        return {
          results:response,
        }
      },
      cache:true,
    }
  })
  var countRittiki=0;
  function newRittiki(){
    
    html=`<tr>
            <td width="65%"><select class="form-control rittiki" name="rittiki[]" id="rittiki`+countRittiki+`"><option value="">select</option></select></td>
            <td width="20%"><input type="number" class="form-control" name="rittiki_ammount[]" placeholder="0.00"></td>
            <td width="15%"><button class="btn  btn-danger" onclick="removeRittik(this)">X</button></td>
          </tr>`
          $('#render_rittiki').append(html);

    $(".rittiki").select2({
    theme:'bootstrap4',
    placeholder:'select',
    allowClear:true,
    ajax:{
      url:"{{URL::to('/get-rittiki')}}",
      type:'post',
      dataType:'json',
      delay:20,
      data:function(params){
        return {
          searchTerm:params.term,
          _token:"{{csrf_token()}}",
          }
      },
      processResults:function(response){
        return {
          results:response,
        }
      },
      cache:true,
    }
  })
    countRittiki+=1;

  }
 $(document).ready(function(){
    newRittiki();
 })
  function removeRittik(val){
    $(val).parent().parent().remove();
  }


  
</script>
