<script type="text/babel">
toc['<?= $id ?>'].title = "Artist: Pearl Jam";
screens['<?= $id ?>'] = function(props) {
    return (
        <Screen title={toc['<?= $id ?>'].title} id="<?= $id ?>">
            <div className="sm--section__main">

                <b>Albums</b>
                <ul>
                    <li><a href="#<?= $id ?>_album">Ten</a></li>
                </ul>

            </div>
        </Screen>
    )
}
</script>




