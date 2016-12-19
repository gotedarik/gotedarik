<style>
.kkte{
    padding: 0!important;
    margin-right: 2px;
    margin-bottom: 15px;
}
</style>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" onclick="getProductGroupStep(null,null,1)" aria-expanded="false" aria-controls="collapseTwo">
                <label class="control-label">Adım Adım Kategorinizi Bulun <i style="font-size: 14px;" class="fa fa-caret-right"></i></label>
            </a>
        </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div id="product-group-step-cont" class="panel-body">
            
          

        </div>
    </div>
</div>



<script type="text/javascript">

function getProductGroupStep(id,element,step)
{

    $(element).parent().find("a").not(element).each(function(){
        $(this).removeClass("active");
    });
    $(element).addClass("active");

    productgroups_id=id;
   
    var data={
        "id":id,
       
    };

    
     var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

    $.ajax({
         type: "POST",
         dataType:'json',  
         url: params.site+"/products/getproductgroupstep", 
         data: dataString,
         timeout: 30000,
         success: function(data)
         {
            for(i=step;i<step+20;i++)
            {
              
                 $('#product-group-step-cont').find('.step_'+i).remove();

            }

            $('#product-group-step-cont').append(groupLi(data.list,step));
            
         }
        });
}


function groupLi(list,step)
{
    c='<div  class="kkte col-lg-3 step_'+step+' '+(step%4==0?'clear':'')+'">'+
            '<div class="list-group">';

    for(i in list)
    {
        c+='<a href="javascript:;" onclick="getProductGroupStep('+list[i].id+',this,'+(step+1)+')"'+
        'class="list-group-item">'+
            list[i].name +'<i class="fa fa-caret-right pull-right"></i>'+
        '</a>';
    }
            
           
        c+='</div>'+
    '</div>';

    return c;
}
</script>
