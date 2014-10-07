<script id="item-input-control" type="text/javascript">
    function capitalizeFirstLetter(str){
        return str.charAt(0).toUpperCase() + str.slice(1);
    }

    function checkItem(item){
        Item = capitalizeFirstLetter(item);
        if ($('table#' + item + ' tbody tr').length > 0) {
            $('#no' + Item).css('display', 'none');
        }
        else {
            $('#no' + Item).css('display', '');
        }
    }

    function registerAddItemHandler(initData, item){
        Item = capitalizeFirstLetter(item);
        $('#add' + Item).click(function(){
            var item_control = $('[name=' + item + '_id]');
            var item_id = item_control.val();
            if (item_id != 0) {
                var exist = false;
                $("tr [name='" + item + "_ids[]']", initData.table).each(function(){
                    if (item_id == $(this).val()){
                        exist = true;
                        return;
                    }
                });
                if (exist){
                    alert(Item + ' telah ditambahkan.');
                    return;
                }

                var row = initData.rowSample.clone();
                $("[name='" + item + "_ids[]']", row).val(item_id);
                var item_text = $('option:selected', item_control).text();
                
                var additional = item_control.data('additional');
                var additional_text = '';
                if (additional != undefined && additional != '')
                {
                    var additionals = additional.split('|');
                    for (var i  = 0; i < additionals.length; i++)
                    {
                        var additional_control = $("[name='" + additionals[i] + "_id']");
                        var additional_id = additional_control.val();
                        $("[name='" + additionals[i] + "_ids[]']", row).val(additional_id);
                        additional_text = additional_text + ' - ' + $('option:selected', additional_control).text(); 
                    }
                }

                $('a.text', row).text(item_text + additional_text).attr('href', "{{ URL::to('" + item + "/detail') }}" + '/' + item_id);
                $('tbody', initData.table).append(row);
            }
            
            item_control.val(0);
            checkItem(item);
        });
    }

    function registerRemoveItemHandler(initData, item){
        Item = capitalizeFirstLetter(item);
        initData.table.on('click', '.remove' + Item, function(){
            $(this).parent().parent().remove();
            checkItem(item);
        });
    }

    function init(item){
        var table = $('table#' + item);
        var rowSample = $('tr.sample', table).clone();
        $('tr.sample', table).remove();
        checkItem(item);
        rowSample.removeClass('sample');
        var initData = {};
        initData.table = table;
        initData.rowSample = rowSample;
        return initData;
    }

    function runItemInputControl(items){
        for (var i = 0; i < items.length; i++){
            Item = capitalizeFirstLetter(items[i]);
            initData = init(items[i], Item);
            registerRemoveItemHandler(initData, items[i], Item);
            registerAddItemHandler(initData, items[i], Item);
        }
    }
</script>