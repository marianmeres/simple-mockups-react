<script type="text/babel">
toc['<?= $id ?>'].title = "Artist: Ten";
screens['<?= $id ?>'] = function(props) {
    return (
        <Screen title={toc['<?= $id ?>'].title} id="<?= $id ?>">
            <div className="sm--section__main">

                <b>Songs</b>
                <ul>
                    <li><a href="#<?= $id ?>_song">Alive</a></li>
                </ul>

            </div>
        </Screen>
    )
}
</script>




