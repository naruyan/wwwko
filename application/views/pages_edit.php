<html>
<head>
<title>Editing <?php echo $name ?></title>
<script src="<?php echo URL::base() ?>js/EpicEditor/js/epiceditor.min.js"></script>
</head>
<body>
<h2>Editing <?php echo $name ?></h2>
<form action="<?php echo $target ?>" method="post">
    <div id="epiceditor"></div>
    <textarea id="content" name="content" style="display: none;"><?php echo $content ?></textarea>
    <div><select name="permissions">
        <option value="<?php echo $permissions ?>"><?php echo $permissions_text[$permissions] ?></option>
        <option value="0"><?php echo $permissions_text[0] ?></option>
        <option value="1"><?php echo $permissions_text[1] ?></option>
        <option value="2"><?php echo $permissions_text[2] ?></option>
    </select></div>
    <div><input type="submit" value="Submit" /></div>
</form>
<form action="<?php echo $back ?>">
    <div><input type="submit" value="Back to Page" /></div>
</form>

<script type="text/javascript">
<!--
var opts = {
  container: 'epiceditor',
  textarea: 'content',
  basePath: '<?php echo URL::base() ?>js/EpicEditor',
  clientSideStorage: true,
  localStorageName: 'epiceditor',
  useNativeFullscreen: true,
  parser: marked,
  file: {
    name: '<?php echo $name ?>',
    defaultContent: '',
    autoSave: 100
  },
  theme: {
    base: '/themes/base/epiceditor.css',
    preview: '/themes/preview/preview-dark.css',
    editor: '/themes/editor/epic-dark.css'
  },
  button: {
    preview: true,
    fullscreen: true,
    bar: "auto"
  },
  focusOnLoad: true,
  shortcut: {
    modifier: 18,
    fullscreen: 70,
    preview: 80
  },
  string: {
    togglePreview: 'Toggle Preview Mode',
    toggleEdit: 'Toggle Edit Mode',
    toggleFullscreen: 'Enter Fullscreen'
  },
  autogrow: false
}

var editor = new EpicEditor(opts).load();
-->
</script>
</body>
</html>
