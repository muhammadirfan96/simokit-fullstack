<div class="row mb-3">
    <div class="col-6">
        <button class="btn fst-italic bg_biru1 text-dark" type="submit" style="width: 100%;">save changes</button>
    </div>
    </form>

    <div class="col-6">
        <form action="/<?= $linkApv; ?>/<?= $data["id"]; ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="approve" value="y">
            <button class="btn fst-italic bg_hijau1 text-dark" type="submit" style="width: 100%;">approve</button>
        </form>
    </div>
</div>