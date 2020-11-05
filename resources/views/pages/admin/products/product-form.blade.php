<div class="form-row">
    <div class="form-group col-md-12">
        <x-form-field :title="__('general.name')"
                      :value="isset($product) ? $product->name : ''"
                      required="true" name="name" type="text"></x-form-field>
    </div>
    <div class="form-group col-md-12">
        <x-form-field :title="__('general.description')"
                      :value="isset($product) ? $product->description : ''"
                      required="true" name="description" type="text"></x-form-field>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <x-form-field :title="__('general.price')"
                      :value="isset($product) ? $product->price : ''"
                      required="true" name="price" type="text"></x-form-field>
    </div>
    <div class="form-group col-md-6">
        <x-form-field :title="__('general.quantity')"
                      :value="isset($product) ? $product->quantity : ''"
                      required="true" name="quantity" type="number"></x-form-field>
    </div>
</div>
<div class="form-row">
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" name="onSale" type="checkbox" {{ isset($product) && $product->on_sale ? 'checked' : '' }}>
            <label class="form-check-label">
                @lang("general.on_sale")
            </label>
        </div>
    </div>
</div>
