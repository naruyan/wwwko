<div class="container">
<form class="form-horizontal" role="form" action="<?php echo $target ?>" method="post">
    <h2><?php echo $title ?></h2>
    <div class="form-group">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Items</h3>
            </div>
            <div class="panel-body">
                <label class="col-lg-10 pull-left">Item Name</label>
                <label class="col-lg-2 pull-left">Quantity</label>
                <div id="item_container">
                <div class="sales_item">
                    <div class="col-lg-10">
                    <select name="items[]" class="form-control" onchange='calculatePrice();'>
                        <option value="" selected></option>
                        <?php foreach ($items as $item) { ?>
                        <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-lg-2">
                    <select name="quantities[]" class="form-control" onchange='calculatePrice();'>
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    </div>
                </div>
                </div>
                <div class="col-lg-12 pull-right">
                    <hr>
                    <button type="button" class="btn btn-lg btn-primary" onclick='$(".sales_item").first().clone().appendTo("#item_container");'>Add Another Item</button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="input_price" class="col-lg-2 control-label">Total Price</label>
        <div class="col-lg-10">
            <p class="form-control-static" id="input_price">0.00</p>
        </div>
    </div>
    <div class="form-group text-center">
            <a href="<?php echo $back ?>" class="btn btn-lg btn-default pull-left">Back</a>
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
    </div>
</form>
</div>
<script>
var items = <?php echo $items_json ?>;

function calculatePrice()
{
    var quantities = $("select[name='quantities\\[\\]']");
    var price = 0.00;

    $("select[name='items\\[\\]']").each(function(index) {
        if (parseInt($(this).val()) > 0)
        {
            price = price + (parseInt(items[$(this).val()]) * parseInt($(quantities.get(index)).val()));
        }
    });
    $("#input_price").text(price.toFixed(2));
}
</script>
