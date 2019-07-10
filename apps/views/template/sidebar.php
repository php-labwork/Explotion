
<div class="w3-card">
    <div class="w3-xlarge w3-padding w3-blue">Tabel Of Content</div>
    <ul class="w3-ul">
        <?php
            foreach($this->getMenu() as $item) { ?>
                <li style='cursor: pointer;' class='w3-hover-light-grey' onclick="location.assign('<?= $this->uri($item->link) ?>')">
                    <?= $item->text ?>
                </li>
            <?php }
        ?>
    </ul>
</div>