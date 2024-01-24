@switch(config('custom.contract.type')[$type]['form_type'])
@case(1)
{{$rental_land_title}}
@break
@case(2)
{{$transfer_land_title}}
@break
@endswitch