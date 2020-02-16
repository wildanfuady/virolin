@extends('campaign.template.index')
@section('title')
<?= $campaign->campaign_name; ?>
@endsection
@section('content')
<?= $campaign->campaign_template ?>
@endsection