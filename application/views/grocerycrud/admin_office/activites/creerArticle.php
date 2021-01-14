<div class="container">
    <?php
    if ((isset($_SESSION['success'])) OR (isset($_SESSION['error']))) { ?>
        <div class="container mt-2">
            <h6 class="text-dark">
                <?php include_once "application/views/main/alertes/alert-index.php"; ?>
            </h6>
        </div>
    <?php } ?>
    <?php echo validation_errors(); ?>
    <?= form_open_multipart('appmain/creerArticle'); ?>
    <div class="form-group">
        <label for="">Titre</label>
        <input type="text" class="form-control" name="title" value="<?= set_value('title'); ?>" required="required">
    </div>
    <div class="form-group">
        <label for="">Contenu ou description de l'article</label>

        <textarea name="body" class="form-control textarea" id="editor" required="required" cols="30"
                  rows="10" placeholder="Description de l'article ou de l'activite"
                  style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= set_value('body'); ?></textarea>
    </div>
    <div class="form-group">
        <label for="">Ajouter une Image</label>
        <input type="file" class="form-control" name="post_image" required="required">
    </div>
    <div class="form-group">
        <label for="">Region</label>
        <select name="region" required="required" class="form-control">

            <option value="provinciales">Provinciales</option>
            <option value="afrique">Afrique</option>
            <option value="monde">Monde</option>
        </select>
    </div>

    <div class="form-group">
        <label for="">Catégorie ou Rubrique</label>
        <select name="category" required="required" class="form-control">
            <?php foreach ($categories as $ligne): ?>
                <option value="<?= $ligne->category_id; ?>"><?= $ligne->category_name; ?></option>
            <?php endforeach; ?>
        </select>
    </div> <div class="form-group">
        <label for="">Nature de l'article</label>
        <select name="nature" required="required" class="form-control">
            <?php foreach ($natures as $ligne): ?>
                <option value="<?= $ligne->nature_id; ?>"><?= $ligne->nature_name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary"
            onclick="return confirm('Vous etes au point de publier un article. Etes-vous vraiment sur?')">Sauvegarder et
        Publier
    </button>
    </form>

</div>
