<script type="text/babel">
toc['<?= $id ?>'].title = "Songs";
screens['<?= $id ?>'] = function(props) {
    return (
        <Screen title={toc['<?= $id ?>'].title} id="<?= $id ?>">
            <div className="sm--section__main">

                <b>A</b>
                <ul>
                    <li><a href="#index_10-artists_artist_album_song">Alive</a></li>
                </ul>

            </div>
        </Screen>
    )
}
</script>



