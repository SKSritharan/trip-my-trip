<div>
    <form method="POST" wire:click.prevent="checkout">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <x-wireui-button rounded positive label="Book now"/>
    </form>
</div>
