<?php $pager->setSurroundCount(2) ?>
<br />
<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('pager.first') ?>">
                    <span aria-hidden="true"><?= lang('pager.first') ?></span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('pager.previous') ?>">
                    <span aria-hidden="true"><?= lang('pager.previous') ?></span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active"' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="<?= lang('pager.next') ?>">
                    <span aria-hidden="true"><?= lang('pager.next') ?></span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('pager.last') ?>">
                    <span aria-hidden="true"><?= lang('pager.last') ?></span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>