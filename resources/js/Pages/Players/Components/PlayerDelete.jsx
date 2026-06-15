import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { router } from "@inertiajs/react";

export default function PlayerDelete({ player, onSuccess, onCancel }) {
    const deletePlayer = () => {
        router.delete(route("players.destroy", player.id), {
            preserveScroll: true,
            onSuccess: () => onCancel(),
            onError: (error) => {
                console.log({ error });
            },
        });
    };

    return (
        <div className="p-6">
            <h3 className="text-lg font-medium text-primaryRed-600">
                Delete Player
            </h3>
            <p>
                Are you sure you want to delete {player.first_name}{" "}
                {player.last_name}? This action cannot be undone.
            </p>
            <div className="flex gap-2 justify-end mt-8">
                <SecondaryButton onClick={() => onCancel()}>
                    Cancel
                </SecondaryButton>
                <PrimaryButton onClick={deletePlayer}>Delete</PrimaryButton>
            </div>
        </div>
    );
}
