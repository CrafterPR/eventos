<?php
echo sprintf("<a href='%s'>%s</a>", route('events.purchases.show', ['purchaseOrder' =>
    $row->id]),$row->reference);
