<div>
    <a href="/admin/store/website/create-store">Create Store View</a>
    <a href="/admin/store/website/create-group">Create Store</a>
    <a href="/admin/store/website/create-website">Create Website</a>
</div>
<div>
    <pre>
        <?php print_r(\app\code\store\models\Website::getCollectionCount()); ?>
        <?php foreach (\app\code\store\models\Website::getCollection() as $collection) : ?>
        <?php print_r($collection); ?>
        <?php endforeach; ?>
    </pre>
</div>