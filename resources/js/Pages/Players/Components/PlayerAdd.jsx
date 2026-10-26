import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { Link } from "@inertiajs/react";
import { useState } from "react";

export default function PlayerAdd({ player, teams, onSuccess, onCancel }) {
    const [selectedTeamId, setSelectedTeamId] = useState(
        player?.team_id ?? teams[0]?.id,
    );
    const [processing, setProcessing] = useState(false);

    if (!player) return <div></div>;

    return (
        <div className="p-6">
            <h3 className="text-lg font-medium text-primaryRed-600">
                Add to team
            </h3>
            <p>
                Assign {player.first_name} {player.last_name} to a team
            </p>
            <form className="flex flex-col mt-4 space-y-4">
                <InputLabel>Select team</InputLabel>
                <select
                    className="rounded-md border-gray-300 shadow-sm focus:border-lightGrey-600 focus:ring-lightGrey-800"
                    value={selectedTeamId}
                    onChange={(e) => setSelectedTeamId(e.target.value)}
                >
                    {teams?.map((team) => (
                        <option key={team.id} value={team.id}>
                            {team.name}
                        </option>
                    ))}
                </select>
                <div className="flex gap-2 justify-end mt-8">
                    <SecondaryButton
                        type="button"
                        onClick={() => {
                            onCancel?.();
                        }}
                    >
                        Cancel
                    </SecondaryButton>

                    <Link
                        as={PrimaryButton}
                        method="post"
                        href={route("teams.players.add", selectedTeamId)}
                        data={{ player_id: player.id }}
                        disabled={processing}
                        onStart={() => setProcessing(true)}
                        onFinish={() => setProcessing(false)}
                    >
                        Add
                    </Link>
                </div>
            </form>
        </div>
    );
}
