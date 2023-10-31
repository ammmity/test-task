<?php if (!empty($arResult['ITEMS'])): ?>
    <ul>
    <?php foreach ($arResult['ITEMS'] as $groupItem): ?>
        <li>
            <a href="<?= $groupItem['LINK'] ?>"><?= $groupItem['NAME'] ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>


