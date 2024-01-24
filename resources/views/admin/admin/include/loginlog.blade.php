<x-card class="card-default color-palette-box">
    <x-slot name="header">
        <x-card.header class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">
                {{ __('Lịch sử đăng nhập') }}
            </h3>
        </x-card.header>
    </x-slot>
    <div class="table-responsive">
        <x-table class="table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>{{ __('Nội dung') }}</th>
                    <th>{{ __('Thời gian') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($loginLog as $item)
                <tr>
                    <td>{{ $item->content }}</td>
                    <td>{{ date('d-m-Y H:i:s', strtotime($item->time)) }}</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">{{ __('Không có bản ghi.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </x-table>
        {!! $loginLog->links() !!}
    </div>
</x-card>
