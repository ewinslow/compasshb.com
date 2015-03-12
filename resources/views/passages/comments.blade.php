<br/><hr/><br/>
<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'compasshb';
    var disqus_url = '{{ route('read.show', $passage->id) }}/';
    var disqus_title = '{{ $passage->title }} - Compass Bible Church';
    var disqus_identifier = 'read-{{ date_format($passage->published_at, 'Y-m-d') }}';

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
