$(function(){
    $('.addeducation').click(function()
    {
        var addmore = '<div><div class="col-md-3"></div><div class="col-md-2"><input type="text" name="education_name[]" placeholder="Education Name"/>'+
                      '</div><div class="col-md-3"><input type="text" name="education_passedyear[]" placeholder="Education Passed year"/>'+
                      '</div><div class="col-md-4"><a href="javascript:void(0)" class="btn btn-danger" onclick="$(this).parent().parent().remove()">- Remove</a></div>'+
                      '<div class="clearfix"></div></div>';
        $('.more_education').append(addmore);
    });
    
})
