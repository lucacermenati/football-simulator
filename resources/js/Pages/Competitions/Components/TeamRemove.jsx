import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { router } from "@inertiajs/react";

export default function TeamRemove({ competition, team, onSuccess, onCancel }) {
    if (!team) return <div></div>;

    const removeTeam = (competitionId, teamId) => {
        router.delete(
            route("competitions.teams.destroy", {
                competition: competitionId,
                team: teamId,
            }),
            {
                preserveScroll: true,
                onSuccess,
            },
        );
    };

    return (
        <div className="p-6">
            <h3 className="text-lg font-medium text-primaryRed-600">
                Remove {team.name} from {competition.name}
            </h3>
            <p>
                Are you sure you want to remove {team.name}? This action cannot
                be undone.
            </p>
            <div className="flex gap-2 justify-end mt-8">
                <SecondaryButton onClick={() => onCancel()}>
                    Cancel
                </SecondaryButton>

                <PrimaryButton
                    onClick={() => removeTeam(competition.id, team.id)}
                >
                    Remove
                </PrimaryButton>
            </div>
        </div>
    );
}
