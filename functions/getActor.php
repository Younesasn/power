<?php
function getActor(int $id, array $actors): ?array
{
    $actorsIds = array_column($actors, 'id_actors');
    $actorKey = array_search($id, $actorsIds);

    if ($actorKey === false) {
        return null;
    }

    return $actors[$actorKey];
}