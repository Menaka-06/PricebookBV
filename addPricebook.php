<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"><?php echo $page_name;?></h4>

                <div class="page-title-right ">
                    <a href="<?php echo base_url()?>pricebook/listPriceBook"
                        class="btn btn-dark mr-3 btn-gradient waves-effect waves-light"><i
                            class="ri-arrow-left-fill"></i> Back</a>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <form method="post" action="<?php echo base_url();?>Pricebook/createPriceBook" onSubmit="return ValidateEmployee();">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Price Book Details</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md d-none">
                            <label for="form-grid-showcode" class="form-label text-muted">Show Code</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">

                            <div class="col-xxl-2 col-xl-3 col-md-3 col-sm-4">
                                <div>
                                    <label for="price_book_name" class="form-label">Price Book Name</label>
                                     <select class="form-control" name="price_book_name" id="price_book_name">
                                        <option value="">--Select PriceBook Name--</option>
                                        <?php if(!empty($price_book)){ foreach($price_book as $PB){ ?>
                                        <option value="<?php echo $PB->pricebookName;?>"><?php echo $PB->pricebookName;?></option>
                                        <?php }} ?></select>
                                    <span class="text-danger small"
                                        id="price_book_name_error"><?php echo form_error('price_book_name'); ?></span>
                                </div>
                            </div>


                            <div class="col-xxl-2 col-xl-3 col-md-3 col-sm-4">
                                <div>
                                    <label for="price_book_code" class="form-label">Price Book Code</label>
                                    <select class="form-control" name="price_book_code" id="price_book_code">
                                        <option value="">--Select PriceBook Code--</option>
                                        <?php if(!empty($price_book)){ foreach($price_book as $PB){ ?>
                                        <option value="<?php echo $PB->pricebookCode;?>"><?php echo $PB->pricebookCode;?></option>
                                        <?php }} ?></select>

                                    <span class="text-danger small"
                                        id="price_book_code_error"><?php echo form_error('price_book_code'); ?></span>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-2 col-xl-3 col-md-3 col-sm-4">
                                <div>
                                    <label for="scheme_code" class="form-label">Scheme Code</label>
                                    <select class="form-control" name="scheme_code" id="scheme_code">
                                        <option value="">--Select An option--</option>

                                        <option value="">Annai Vehicle</option>
                                    </select>
                                    <span class="text-danger small" id="scheme_code_error"></span>
                                </div>
                            </div>



                            <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-6">
                                <div>
                                    <label for="description" class="form-label">Description</label>
                                   <select class="form-control" name="description" id="description">
                                        <option value="">--Select Description--</option>
                                        <?php if(!empty($price_book)){ foreach($price_book as $PB){ ?>
                                        <option value="<?php echo $PB->pricebookDescription;?>"><?php echo $PB->pricebookDescription;?></option>
                                        <?php }} ?></select>
                                         <span class="text-danger small" id="description_error"></span>
                                </div>

                            </div>

                        </div>
                        <!--end col-->

                    </div>
                    <!--end row-->
              </div>

            </div>
            <div class="col-xxl-12">
              <span class="mb-4 float-end btn btn-secondary btn-gradient waves-effect waves-light 
              add_price_book"><span >Add</span></span>
             </div>
        </div>
         
    


    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="table-responsive">
                                      <input type="hidden" name="last_table_count" id="last_table_count" value="0">
                                    <table class="table table-hover align-middle table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sno</th>
                                                <th scope="col">Product SKU</th>
                                                <th scope="col">Product name </th>
                                                <th scope="col">HSN Code</th>
                                                <th scope="col">MRP</th>
                                                <th scope="col">Discount(%)</th>
                                                <th scope="col">Damage Discount(%) </th>
                                                <th scope="col">DP</th>
                                                <th scope="col">BV</th>
                                                

                                            </tr>
                                        </thead>
                                         <tbody id="addPriceBook">
                                           
                                        </tbody>
                                    </table>
                                   
                                </div>
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->
                    </div>

                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>


    
    <div class="row">
        <div class="col-12 d-flex justify-content-end  mb-4 ">
            <button type="reset"
                class=" btn btn-dark mr-3 btn-gradient waves-effect waves-light me-2"><span>Clear</span></button>
            <button type="submit" class=" btn btn-secondary btn-gradient waves-effect waves-light"
                name="PriceBook_Inv"><span>Submit</span></button>
        </div>
    </div>
    </form>
</div>


<!-- container-fluid -->
<!--  Extra Large modal example -->
    <div class="modal fade bs-example-modal-xl"  data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">PriceBook List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
            
                        <form action="#" method="post">
                        <div class="row gy-4">
                            <div class="col-xxl-2 col-xl-3 col-md-3 col-sm-4">
                                <div>
                                    <label for="price_book_code" class="form-label "> PriceBook Code</label>
                                    <input type="text" class="form-control" id="price_book_code"  name="price_book_code">
                                    <span class="text-danger small" id="price_book_code_error"></span>
                                </div>
                            </div>

                            <div class="col-xxl-2 col-xl-3 col-md-3 col-sm-4">
                                <div>
                                    <label for="price_book_sku" class="form-label ">SKU</label>
                                    <input type="text" class="form-control" id="price_book_sku"  name="price_book_sku">
                                    <span class="text-danger small" id="price_book_sku_error"></span>
                                </div>
                            </div>

                            <div class="col-xxl-2 col-xl-3 col-md-3 col-sm-4">
                                <div>
                                    <label for="price_book_name" class="form-label ">PriceBook Name</label>
                                    <input type="text" class="form-control" id="price_book_name"  name="price_book_name">
                                    <span class="text-danger small" id="price_book_name_error"></span>
                                </div>
                            </div>

                            

                            <div class="col-xxl-2 col-xl-3 col-md-3 col-sm-4">
                                <div class= "mt-4">
                                    <label for="price_book_code" class="form-label mt-3"></label>
                                    <button type="submit" class="btn btn-success btn-sm search_btn" name="search_price_book">Search</button>
                                    <span class="btn btn-secondary btn-sm search_btn" id="insert_inventory">Insert</span>
                                </div>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>
                    <hr>
                    <div class="col-xl-12">
                        <div class="table-responsive">
                            <p class="text-center text-danger ft10" id="inv_ins_error_msg"></p>
                            <table class="table table-hover align-middle table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product SKU</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">HSN Code</th>
                                        <th scope="col">MRP</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">DPPrice</th>
                                        <th scope="col">Damage Discount</th>
                                        <th scope="col">BV</th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="import_data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a>
                    <!-- <button type="button" class="btn btn-primary ">Insert</button> -->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!-- End of large modal -->

<script>
    $(document).ready(function(){
        $('.add_price_book').click(function(){
            var price_book_name=$('#price_book_name').val();
            var price_book_code=$('#price_book_code').val();
            var scheme_code=$('#scheme_code').val();
            var description=$('#description').val();
           alert ('test');

            if(price_book_name==""){
                $('#price_book_name_error').html('Pricebook Name Cannot be empty');
                return false;
            }else{
                $('#price_book_name_error').html('');
            }

            if(price_book_code==""){
                $('#price_book_code_error').html('Pricebook Code Cannot be empty');
                return false;
            }else{
                $('#price_book_code_error').html('');
            }

             if(scheme_code==""){
                $('#scheme_code_error').html('Pricebook Scheme Code Cannot be empty');
                return false;
            }else{
                $('#scheme_code_error').html('');
            }

            if(description==""){
                $('#description_error').html('Pricebook description Cannot be empty');
                return false;
            }else{
                $('#description_error').html('');
            }


            $.ajax({
                  type: 'POST',
                  url: baseURL+'ajax/getPriceBookbyId',
                  data:{"group": HSN_code},
                  success: function(data) 
                  {
                    const obj = JSON.parse(data);
                    if(obj.status){
                        $('#import_data').html(obj.data);
                        if(obj.msg){
                            $('#insert_inventory').show();
                        }else{
                          $('#insert_inventory').hide();  
                        }
                        $('.bs-example-modal-xl').modal('show');
                    }else{
                        alert('Invalid Data');
                    }
                  }
                });
        });

        $('#insert_inventory').click(function(){
            var checked=$('input[name="pricebook_sel_id[]"]:checked').length;
            var Table='';
            var i=$('#last_table_count').val();
            if(checked > 0){
                $('#inv_ins_error_msg').html('');
                $('input[name="pricebook_sel_id[]"]:checked').each(function(X){
                    var val = $(this).val();
                    var pricebook_snum=$('#pricebook_snum'+val).val();
                    var product_SKU=$('#product_SKU'+val).val();
                    var product_name=$('#product_name'+val).val();
                    var HSN_code_pb=$('#HSN_code_pb'+val).val();
                    var MRP_pb=$('#MRP_pb'+val).val();
                    var discount_pb=$('#discount_pb'+val).val();
                    var DP_pb=$('#DP_pb'+val).val();
                    var damage_discount_pb=$('#damage_discount_pb'+val).val();
                    var BV_pb=$('#BV_pb'+val).val();
                   

                    Table+="<tr id='"+i+"'><td><input type='hidden' name='pb_pricebook_snum[]' id='pb_pricebook_snum_"+i+"' required value='"+pricebook_snum+"' class='form-control'><p>"+product_SKU+"</p></td><td><p>"+product_name+"</p></td><td><p>"+HSN_code_pb+"</p></td><td><p>"+MRP_pb+"</p></td><td><p>"+discount_pb+"</p></td><td><p>"+product_uom+"</p></td><td><input type='text' name='pb_DP_pb[]' id='pb_DP_pb_"+i+"'  value='"+DP_pb+"' class='form-control'></td><td><input type='text' name='pb_damage_discount_pb[]' id='pb_batch_no_"+i+"'  value='"+damage_discount_pb+"' class='form-control'></td><td><input type='text' name='pb_BV_pb[]' id='pb_BV_pb_"+i+"'  value='"+BV_pb+"' class='form-control'></td><td><span class='Delete_OST'><i class='ri-delete-bin-2-fill'></i></span></td></tr>";
                    i++;
                });
                $('#last_table_count').val(i);
                $('#addPriceBook').append(Table);
                $('.bs-example-modal-xl').modal('hide');
                
            }else{
                $('#inv_ins_error_msg').html('Please Select Any One Pricebook');
                return false;
            }
        });

</script>