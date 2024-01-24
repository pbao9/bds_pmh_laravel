@foreach($categories as $item)
    <x-link :href="route('admin.category.edit', $item['id'] ?? 0)" class="badge badge-primary" target="_blank" :title="$item['name'] ?? ''" />
@endforeach