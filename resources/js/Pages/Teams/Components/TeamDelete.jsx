import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { router } from "@inertiajs/react";

export default function TeamDelete({ team, onCancel }) {
    const deleteTeam = () => {
        router.delete(route("teams.destroy", team.id), {
            preserveScroll: true,
            onSuccess: () => onCancel(),
        });
    };

    return (
        <div className="p-6">
            <h3 className="text-lg font-medium text-primaryRed-600">
                Delete team
            </h3>
            <p>
                Are you sure you want to delete {team.name}? This action cannot
                be undone.
            </p>
            <div className="flex gap-2 justify-end mt-8">
                <SecondaryButton onClick={() => onCancel()}>
                    Cancel
                </SecondaryButton>
                <PrimaryButton onClick={deleteTeam}>Delete</PrimaryButton>
            </div>
        </div>
    );
}
