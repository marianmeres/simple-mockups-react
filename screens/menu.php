<script type="text/babel">
toc['<?= $id ?>'].title = "App Menu";
screens['<?= $id ?>'] = function(props) {
    return (
        <Screen title={toc['<?= $id ?>'].title} id="<?= $id ?>">
            <div className="sm--section__main">

                <ul>
                    <li><a href="#<?= $id ?>_settings">Settings</a> (intentionally broken link)</li>
                    <li>...</li>
                </ul>

            </div>
        </Screen>
    )
}
</script>





