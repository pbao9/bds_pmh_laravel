<form action="{{ route('ketquatimkiem') }}" method="post">
    <div class="input-group rounded search-form">
        <input type="search" class="form-control rounded"  value="{{ $result ?? '' }}" 
            id="auto-text-2" aria-describedby="search-addon" name="keyword"/>
        <span class="input-group-text border-0" id="search-addon" type="submit">
            <i class="fas fa-search"></i>
        </span>
        <!-- <p id="ketqua"></p> -->
    </div>
    @csrf
</form>
<script>
    var timeout;
	$("#auto-text-2").keyup(function(e) {
        clearTimeout(timeout);
		e.preventDefault();
		var text = $("input[name='keyword']").val();
        console.log(text);
        if(text.length >=3){
            $.ajax({
			url: "{{route('timKiem')}}",
			type: 'GET',
			dataType: 'json',
			data: {keyword: text},
			success: function (response) {
                timeout = setTimeout(() => {
                    var notePrint = ''; 
                    $.each(response.land, function(k, v) {
                        var url = window.location.href + 'danh-muc-san-pham/'+ v.category_to_land[0].category.slug + '/' + v.slug;
                        notePrint += "<a href='" + url + "'>" 
                            + "<p class='m-0 ket-qua-ct'>" +v.title + "</p></a>";
                    });
                    console.log(response.land);
                    $('#ketqua').empty();
                    $('#ketqua').html(notePrint);
                    $('#ketqua').show();
                }, 1000);
			}
		})
        }
		
	});
    $(function(){
        var $win = $(window);
        var $box = $("#ketqua");
        
        $win.on("click.Bst", function(event){		
            $('#ketqua').hide();
        });
    });
</script>