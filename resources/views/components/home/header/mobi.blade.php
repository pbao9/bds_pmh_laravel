<!-- Header mobi from max width 850px  -->
<nav class="navbar fixed-top nav-menu-mobi">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{ asset('/public/images/logo_vh.jpg') }}" width="50">
        </a>
        <form class="d-flex m-0 position-relative" role="search">
            <input type="search" class="form-control rounded"  placeholder="" 
                id="auto-text-1" aria-describedby="search-addon" name="keyword2"/>
            <p id="ketqua-2"></p>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!---- Content header mobile ---->
        <div class="offcanvas menu-drop offcanvas-end" tabindex="-1" 
            id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header m-0 p-0">
                <ul class="nav nav-pills w-100" id="pills-tab" role="tablist">
                    <li class="nav-item p-0 w-50" role="presentation">
                        <button class="nav-link active w-100 text-dark" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            Menu
                        </button>
                    </li>
                    <li class="nav-item p-0 w-50" role="presentation">
                        <button class="nav-link w-100 text-dark" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" 
                            type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Tư vấn
                        </button>
                    </li>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-light p-0">
                <ul class="navbar-nav justify-content-end flex-grow-1">
                    <div class="tab-content" id="pills-tabContent">
                        <!-- Tab menu here -->
                        <div class="tab-pane fade show active" id="pills-home"
                            role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

<!-------------- List Menu Here -------------->
                            @foreach ($land as $key)
                            <li class="nav-item position-relative">
                                    <a class="nav-link text-dark p-0"href="{{ route('purpose', $key->first()->purpose) }}">
                                        {{ getLandPurpose($key->first()->purpose )}}
                                    </a>
                                    <a href="#" class="next-menu" onclick="open_child_menu_item_{{ $key->first()->id }}()">  
                                    <i class="fas fa-chevron-right float-end"></i></a>
                                <div id="mySidenav_{{ $key->first()->id }}" class="sidenav">
                                    <a class="side_child_first" href="#" onclick="close_child_menu_item_{{ $key->first()->id }}()">
                                        {{ getLandPurpose($key->first()->purpose )}} <i class="fas fa-chevron-left float-end mt-3"></i>
                                    </a> 
                                    @foreach($key->pluck('category_to_land')->collapse()->pluck('category')->unique() as $value)
                                        <a href="{{ route('category', $value->slug) }}">{{ $value->name }}</a>
                                    @endforeach
                                </div>
                            </li>
                            @endforeach


                            <li class="nav-item position-relative">
                                    <a class="nav-link text-dark p-0"href="{{ route('post') }}">
                                        Tin tức
                                    </a>
                                    <a href="#" class="next-menu" onclick="open_child_menu_item_tintuc()">  
                                    <i class="fas fa-chevron-right float-end"></i></a>
                                <div id="mySidenav_tintuc" class="sidenav">
                                    <a class="side_child_first" href="#" onclick="close_child_menu_item_tintuc()">
                                        Tin tức <i class="fas fa-chevron-left float-end mt-3"></i>
                                    </a> 
                                    @foreach($category_post as $value)
                                        <a href="{{ route('postCategory', $value->slug) }}">{{ $value->name }}</a>
                                    @endforeach
                                </div>
                            </li>
<!-------------- List Menu End! -------------->
                        </div>
                        <!-- Tab tư vấn here -->
                        <div class="tab-pane fade" id="pills-profile" 
                            role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            
                        </div>
                    </div>
                </ul>
            </div>
            <!---- End content header mobile ---->
        </div>
    </div>
</nav>
@push('scripts-memu')
@foreach ($land as $value)
<script>
    function open_child_menu_item_{{$value->first()->id}}() {
        document.getElementById("mySidenav_{{$value->first()->id}}").style.width = "260px";
    }
        
    function close_child_menu_item_{{$value->first()->id}}() {
        document.getElementById("mySidenav_{{$value->first()->id}}").style.width = "0";
    }
</script>
@endforeach
<script>
    function open_child_menu_item_tintuc() {
        document.getElementById("mySidenav_tintuc").style.width = "260px";
    }
        
    function close_child_menu_item_tintuc() {
        document.getElementById("mySidenav_tintuc").style.width = "0";
    }
</script>
<script>
    var timeout2;
	$("#auto-text-1").keyup(function(e) {
        clearTimeout(timeout);
		e.preventDefault();
		var text = $("input[name='keyword2']").val();
        console.log(text);
        if(text.length >=3){
            $.ajax({
			url: "{{route('timKiem')}}",
			type: 'GET',
			dataType: 'json',
			data: {keyword2: text},
			success: function (response) {
                timeout2 = setTimeout(() => {
                    var notePrint = ''; 
                    $.each(response.land, function(k, v) {
                        var url = window.location.href + 'danh-muc/'+ v.category_to_land[0].category.slug + '/' + v.slug;
                        notePrint += "<a href='" + url + "'>" 
                            + "<p class='m-0 ket-qua-ct'>" +v.title + "</p></a>";
                    });
                    console.log(response.land);
                    $('#ketqua-2').empty();
                    $('#ketqua-2').html(notePrint);
                    $('#ketqua-2').show();
                }, 1000);
			}
		})
        }
		
	});
    $(function(){
        var $win2 = $(window);
        $win2.on("click.Bst", function(event){		
            $('#ketqua-2').hide();
        });
    });
</script>
@endpush