<!-- our scripts come first because they affect primary UI features -->
<script src="{{ elixir('js/all.js') }}" async defer></script>

<!-- third-party widgets come next because they are secondary UI features -->
<div id="fb-root"></div>
<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0&appId=386571371526429" id="facebook-jssdk" async defer></script>

@if(Request::url() !== 'http://compasshb.local')
<!-- Jira Issue Collector -->
<script type="text/javascript" src="https://jira.compasshb.com:8443/s/89d9d5918b55a1bc8d0c0ba6a23de98c-T/en_US-s0756c/64020/3/1.4.25/_/download/batch/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector.js?locale=en-US&collectorId=15b2aa65"></script>
@endif

<!-- Analytics comes last because it is not user-facing -->
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
<script>
    (function (i, r) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
    })(window, 'ga');

    ga('create', 'UA-53384235-1', 'auto');
    ga('send', 'pageview');
</script>
