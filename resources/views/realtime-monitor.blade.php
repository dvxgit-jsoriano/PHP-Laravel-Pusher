<x-app-layout>
    <div class="py-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-4">

            <!-- TEAM -->
            <div id="rtm_dashboard" class="p-6 bg-white border-b border-gray-200">
                @foreach ($teams as $team)
                    <h1 class="text-xl font-bold mb-4">{{ $team->name }}</h1>
                    <div id="team" data-team="{{ $team->name }}" class="flex flex-wrap gap-4 mb-4">
                </div>
                @endforeach
                {{-- <h1 class="text-xl font-bold mb-4">Team Diavox</h1>
                <div class="flex flex-wrap gap-4">
                    <!-- Employee Card -->
                    <div id="employee_card" class="card card-side bg-base-100 shadow-xl h-28 w-auto rounded-none">
                        <figure class="w-28"><img src="{{ asset('images/img_avatar.png') }}" alt="Movie"></figure>
                        <div class="card-body">
                            <h2 class="card-title">Jerome Soriano</h2>
                            <div class="card-actions justify-end">
                                <div class="badge p-4">CALLING</div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>


<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    
    var pusher = new Pusher('4ad1d0c8e978c0c9769f', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('rtm-channel');
    channel.bind('rtm-event', function(data) {
      //alert(JSON.stringify(data));
      console.log(data);

      $("#rtm_dashboard #team").empty();

      data.message.forEach(element => {
        var team = $("#rtm_dashboard").find(`[data-team="${element.team}"]`);
        badge_color = "bg-secondary";
        if(element.data_log_detail.aux_main=="LOGOUT") badge_color = "bg-secondary";
        else if(element.data_log_detail.aux_main=="ON") badge_color = "bg-success";
        else if(element.data_log_detail.aux_main=="BREAK") badge_color = "bg-danger";
        else if(element.data_log_detail.aux_main=="OTHER") badge_color = "bg-warning";
        else badge_color = "bg-secondary";
        team.append(
            `<div id="employee_card" class="card card-side bg-base-100 shadow-xl h-28 w-auto rounded-none">
                <figure class="w-28"><img src="{{ asset('images/img_avatar.png') }}" alt="Movie"></figure>
                <div class="card-body">
                    <h2 class="card-title">${element.first} ${element.last}</h2>
                    <div class="card-actions justify-end">
                        <div class="badge ${badge_color} p-4">${element.data_log_detail.aux_sub}</div>
                    </div>
                </div>
            </div>`);
      });
      
    });
</script>