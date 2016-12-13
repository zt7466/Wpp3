<!-- So I don't get yelled at -->
  <?php
    require_once 'Gateways/EventsGateway.php';
    require_once 'Gateways/PointsGateway.php';
    require_once 'Gateways/TeamsGateway.php';

    $evg = new EventsGateway();
    $events = $evg->getRecentEvents(100); // 100 something something enough for everyone something something

    $current_id = -1;

    $event_name;
    $event_date;
    $event_desc;
    $first = true;

    foreach($events as $event) {
      $event_tn = $event['team_name'];
      $event_tp = $event['points'];
      $team_bg = $event['team_bg'];

      // Print New Event Header
      if($current_id != $event['id']) {
        if($first != true) {
        ?>
              </div>
              <p><?php echo $event_desc; ?></p>
            </div>
            <?php if($logged_in) { ?>
            <div class="card-action">
              <a href="event_delete.php?event_id=<?php echo $current_id;?>">Delete</a>
            </div>
            <?php } ?>
          </div>
        </div>
        <?php
        }

        $event_name = $event['event_name'];
        $event_date = $event['event_date'];
        $event_desc = $event['event_desc'];
        $current_id = $event['id'];
        $first = false;

        ?>
        <div class="row s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title"><?php echo $event_name . " (" . $event_date . ")"; ?></span>

              <div class="card horizontal">
        <?php } ?>
              <div class="card-stacked" style="background-color: <?php echo $team_bg; ?>;">
                <div class="card-content white-text">
                  <p><?php echo $event_tn; ?></p>
                  <h2><?php echo $event_tp; ?></h2>
                </div>
              </div>
<?php } ?>
        </div>
        <p><?php echo $event_desc; ?></p>
    </div>
    <?php if($logged_in) { ?>
    <div class="card-action">
      <a href="event_delete.php?event_id=<?php echo $current_id;?>">Delete</a>
    </div>
    <?php } ?>
    </div>
</div>
