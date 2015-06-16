  <script>
var DailyReading = {
  getAudioHref: function () {
    var as = document.getElementsByTagName('a');
    for (var i = 0; i < as.length; i++) {
      var href = as[i].href;
      if (href.indexOf('esvmedia.org') != -1) {
        return href;
      }
    }
  },

  getSibling: function () {
    return document.getElementsByClassName('tk-seravek-web')[0].nextSibling.nextSibling;
  },

  getParent: function () {
    return DailyReading.getSibling().parentNode;
  },

  insertNode: function (node) {
    DailyReading.getParent().insertBefore(node, DailyReading.getSibling());
  },

  clearSecondTitle: function () {
    var x = document.getElementsByTagName('h2')[0];
    if (x != null)
      x.remove();
  },

  insertAudioNode: function () {
    var audioNode = document.createElement('audio');
    audioNode.src = DailyReading.getAudioHref();
    audioNode.controls = 'controls';
    DailyReading.insertNode(audioNode);
  },

  prepareReading: function () {
    DailyReading.insertAudioNode();
    DailyReading.clearSecondTitle();
  }
};

DailyReading.prepareReading();
</script>
