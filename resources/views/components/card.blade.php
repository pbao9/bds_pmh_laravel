<div {{ $attributes->merge(['class' => 'card']) }}>

    @isset($header)
        {{ $header }}
    @endisset
    <!-- /.card-header -->
    <div class="card-body">
        {{ $slot }}
    </div>
    <!-- /.card-body -->

    @isset($footer)
        <div {{ $footer->attributes->merge(['class' => 'card-footer']) }}>
            {{ $footer }}
        </div>
    @endisset
    <!-- /.card-footer -->

</div>